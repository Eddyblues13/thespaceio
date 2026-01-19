<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentWithdrawals = $user->transactions()
            ->withdrawals()
            ->latest()
            ->take(5)
            ->get();

        $limits = [
            'daily' => 10000,
            'monthly' => 50000,
            'single' => 25000,
        ];

        return view('dashboard.withdrawal', compact('user', 'recentWithdrawals', 'limits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'method' => 'required|string',
            'wallet_address' => 'required_if:method,crypto',
            'currency' => 'required_if:method,crypto',
        ]);

        $user = Auth::user();

        // Get available balance (only completed transactions count toward balance)
        $availableBalance = $user->cash_balance;

        if ($availableBalance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient funds for withdrawal. Available balance: $' . number_format($availableBalance, 2)]);
        }

        // Check minimum withdrawal amount
        if ($request->amount < 10) {
            return back()->withErrors(['amount' => 'Minimum withdrawal amount is $10.00']);
        }

        // Create withdrawal transaction
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'withdrawal',
            'title' => ucfirst($request->method) . ' Withdrawal',
            'description' => $request->has('wallet_address') && $request->wallet_address 
                ? 'Funds withdrawn via ' . $request->method . ' to ' . substr($request->wallet_address, 0, 10) . '...'
                : 'Funds withdrawn via ' . $request->method,
            'amount' => -abs($request->amount), // Ensure negative amount
            'status' => 'pending',
            'method' => $request->method,
            'reference' => 'WD_' . time() . '_' . rand(1000, 9999),
            'metadata' => [
                'currency' => $request->currency ?? 'USD',
                'wallet_address' => $request->wallet_address ?? null,
            ],
        ]);

        return redirect()->route('dashboard.withdrawal')
            ->with('success', 'Withdrawal request submitted successfully! It will be processed within 24-48 hours.');
    }
}
