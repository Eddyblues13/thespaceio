<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentTransactions = $user->transactions()
            ->latest()
            ->take(5)
            ->get();

        $investmentData = [
            'total_investment' => $user->total_investment,
            'cash_balance' => $user->cash_balance,
            'monthly_return' => $user->monthly_return,
            'total_returns' => $user->total_returns,
        ];

        return view('dashboard.dashboard', compact('user', 'recentTransactions', 'investmentData'));
    }

    // Today's Gain page
    public function todaysGain()
    {
        return view('dashboard.todaysgain');
    }

    // Portfolio page
    public function portfolio()
    {
        return view('dashboard.portfolio');
    }

    // Investments page
    public function investment()
    {
        return view('dashboard.investments');
    }

    // Transactions page
    public function transactions()
    {
        return view('dashboard.transactions');
    }

    // Insurance page
    public function insurance()
    {
        return view('dashboard.insurance');
    }

    // Settings page
    public function settings()
    {
        return view('dashboard.settings');
    }

    public function accountManager()
    {
        return view('dashboard.accountmanager');
    }

    public function installmentPayment()
    {
        return view('dashboard.installmentalpayment');
    }

    public function reports()
    {
        return view('dashboard.reports');
    }


    // Add change password method
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'errors' => ['current_password' => ['Current password is incorrect']]
            ], 422);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully!'
        ]);
    }

    // Add logout method
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.page');
    }
}
