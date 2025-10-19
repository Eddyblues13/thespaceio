<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.settings', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'zip_code' => 'nullable|string',
        ]);

        $user->update($request->only([
            'name',
            'email',
            'phone',
            'address',
            'city',
            'state',
            'zip_code'
        ]));

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateSecurity(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }

            $user->update(['password' => Hash::make($request->new_password)]);
        }

        $user->update([
            'two_factor_enabled' => $request->boolean('two_factor_enabled'),
            'login_notifications' => $request->boolean('login_notifications'),
            'session_timeout' => $request->session_timeout,
        ]);

        return back()->with('success', 'Security settings updated successfully!');
    }

    public function updateNotifications(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'email_notifications' => $request->boolean('email_notifications'),
            'push_notifications' => $request->boolean('push_notifications'),
            'sms_alerts' => $request->boolean('sms_alerts'),
        ]);

        return back()->with('success', 'Notification settings updated successfully!');
    }
}
