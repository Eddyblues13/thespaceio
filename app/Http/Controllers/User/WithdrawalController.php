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

        if ($user->cash_balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient funds for withdrawal']);
        }

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'withdrawal',
            'title' => ucfirst($request->method) . ' Withdrawal',
            'description' => 'Funds withdrawn via ' . $request->method,
            'amount' => -$request->amount,
            'status' => 'pending',
            'method' => $request->method,
            'metadata' => [
                'currency' => $request->currency,
                'wallet_address' => $request->wallet_address,
            ],
        ]);

        return redirect()->route('transactions')
            ->with('success', 'Withdrawal request submitted successfully!');
    }
}
