<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('home.signup'); // Changed from 'auth.signup' to 'home.signup'
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        // Log the incoming request for debugging
        Log::info('Registration attempt', [
            'email' => $request->email,
            'ip' => $request->ip()
        ]);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            Log::warning('Registration validation failed', [
                'errors' => $validator->errors()->all(),
                'email' => $request->email
            ]);

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Create the user
            $user = $this->create($request->all());

            Log::info('User created successfully', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            // Log in the user automatically
            Auth::login($user);

            Log::info('User logged in successfully', [
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            // Send welcome email (in background)
            try {
                Mail::to($user->email)->send(new WelcomeEmail($user));
                Log::info('Welcome email sent successfully', ['user_id' => $user->id]);
            } catch (\Exception $e) {
                Log::error('Failed to send welcome email: ' . $e->getMessage());
                // Don't fail registration if email fails
            }

            // Check if user is authenticated
            if (Auth::check()) {
                Log::info('User authenticated, redirecting to dashboard', ['user_id' => Auth::id()]);

                return redirect()->route('dashboard')
                    ->with('success', 'Registration successful! Welcome to AI Investment Platform.');
            } else {
                Log::error('User not authenticated after registration', ['user_id' => $user->id]);

                return redirect()->route('login.page')
                    ->with('success', 'Registration successful. Please log in.');
            }
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Registration failed. Please try again. Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country_code' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code'],
            'agree_terms' => ['required', 'accepted'],
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'country_code.required' => 'Country code is required.',
            'phone.required' => 'Phone number is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
            'agree_terms.required' => 'You must agree to the Terms of Service and Privacy Policy.',
            'referral_code.exists' => 'The referral code is invalid.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    protected function create(array $data)
    {
        try {
            $userData = [
                'first_name'    => $data['first_name'],
                'last_name'     => $data['last_name'],
                'email'         => $data['email'],
                'country_code'  => $data['country_code'],
                'phone'         => $data['phone'],
                'password'      => Hash::make($data['password']),
            ];

            // If referral code is provided, find the referrer
            if (!empty($data['referral_code'])) {
                $referrer = User::where('referral_code', $data['referral_code'])->first();
                if ($referrer) {
                    $userData['referred_by'] = $referrer->id;
                    Log::info('Referral code used', [
                        'referral_code' => $data['referral_code'],
                        'referrer_id' => $referrer->id
                    ]);
                }
            }

            // Create the user
            $user = User::create($userData);

            // Generate referral code for new user
            $user->referral_code = User::generateReferralCode();
            $user->save();

            Log::info('User created with referral code', [
                'user_id' => $user->id,
                'referral_code' => $user->referral_code
            ]);

            return $user;
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            Log::error('User data: ', $data);
            throw $e;
        }
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('home.signin');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        Log::info('Login attempt', ['email' => $request->email, 'ip' => $request->ip()]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        try {
            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();

                Log::info('Login successful', ['user_id' => Auth::id()]);

                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Welcome back!');
            }

            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } catch (ValidationException $e) {
            Log::warning('Login failed', ['email' => $request->email]);

            return back()
                ->withErrors($e->errors())
                ->withInput($request->except('password'))
                ->with('error', 'Invalid credentials. Please try again.');
        }
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        $userId = Auth::id();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('User logged out', ['user_id' => $userId]);

        return redirect('/')
            ->with('success', 'You have been logged out successfully.');
    }
}
