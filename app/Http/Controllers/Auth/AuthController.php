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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = $this->create($request->all());
            Auth::login($user);

            return redirect()->route('dashboard')
                ->with('success', 'Registration successful! Welcome to AI Investment Platform.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Registration failed. Please try again.')
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

        // ✅ First, create the user
        $user = User::create($userData);

        // ✅ Then, send the welcome email
        try {
            Mail::to($user->email)->send(new WelcomeEmail($user));
        } catch (\Exception $e) {
            Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        return $user;
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

    /**
     * Show the dashboard.
     */
}
