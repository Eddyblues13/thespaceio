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
        return view('auth.signup');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(Request $request)
    {
        // Debug logging
        Log::info('Registration attempt:', $request->except('password', 'password_confirmation'));

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            Log::info('Validation failed:', $validator->errors()->toArray());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            Log::info('Creating user...');
            $user = $this->create($request->all());
            Log::info('User created:', ['id' => $user->id, 'email' => $user->email]);

            Auth::login($user);
            Log::info('User logged in successfully');

            return redirect()->route('dashboard')
                ->with('success', 'Registration successful! Welcome to AI Investment Platform.');
        } catch (\Exception $e) {
            Log::error('Registration exception: ' . $e->getMessage());
            Log::error('Registration trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Registration failed: ' . $e->getMessage())
                ->withInput($request->except('password', 'password_confirmation'));
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
            }
        }

        // Generate referral code for the new user
        $userData['referral_code'] = $this->generateReferralCode();

        // ✅ First, create the user
        $user = User::create($userData);

        // ✅ Then, send the welcome email
        try {
            Mail::to($user->email)->send(new WelcomeEmail($user));
            Log::info('Welcome email sent to: ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        return $user;
    }

    /**
     * Generate a unique referral code.
     */
    private function generateReferralCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        } while (User::where('referral_code', $code)->exists());

        return $code;
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.signin');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
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

                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Welcome back!');
            }

            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput($request->except('password'));
        }
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'You have been logged out successfully.');
    }
}
