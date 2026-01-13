<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use App\Mail\AdminUserEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'country_code' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load(['transactions', 'investments']);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'country_code' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'),
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function loginAs(User $user)
    {
        // Logout admin first
        Auth::guard('admin')->logout();
        
        // Login as user
        Auth::guard('web')->login($user);
        
        return redirect('/user/dashboard')->with('success', 'Logged in as ' . $user->full_name);
    }

    public function addFunds(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'title' => 'Admin Fund Addition',
            'description' => $request->description,
            'amount' => $request->amount,
            'status' => 'completed',
            'method' => 'admin',
            'reference' => 'ADMIN_' . time(),
            'processed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Funds added successfully.');
    }

    public function sendEmail(Request $request, User $user)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to($user->email)->send(new AdminUserEmail($request->subject, $request->message));

        return redirect()->back()->with('success', 'Email sent successfully.');
    }

    public function userTransactions(User $user)
    {
        $transactions = $user->transactions()->latest()->paginate(10);
        return view('admin.users.transactions', compact('user', 'transactions'));
    }

    public function userInvestments(User $user)
    {
        $investments = $user->investments()->latest()->paginate(10);
        return view('admin.users.investments', compact('user', 'investments'));
    }
}
