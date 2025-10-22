<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentDeposits = $user->transactions()
            ->deposits()
            ->latest()
            ->take(5)
            ->get();

        // Get user's account summary
        $accountSummary = [
            'cash_balance' => $user->cash_balance,
            'pending_deposits' => $user->transactions()
                ->deposits()
                ->pending()
                ->sum('amount'),
            'last_deposit' => $user->transactions()
                ->deposits()
                ->completed()
                ->latest()
                ->first(),
        ];

        return view('dashboard.deposit', compact('user', 'recentDeposits', 'accountSummary'));
    }


    public function directDeposit()
    {
        $user = Auth::user();
        $recentDeposits = $user->transactions()
            ->deposits()
            ->latest()
            ->take(5)
            ->get();

        // Get user's account summary
        $accountSummary = [
            'cash_balance' => $user->cash_balance,
            'pending_deposits' => $user->transactions()
                ->deposits()
                ->pending()
                ->sum('amount'),
            'last_deposit' => $user->transactions()
                ->deposits()
                ->completed()
                ->latest()
                ->first(),
        ];

        return view('dashboard.directdeposit', compact('user', 'recentDeposits', 'accountSummary'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'method' => 'required|string|in:crypto,bank,wire,cashapp',
            'currency' => 'required|string',
        ]);

        $user = Auth::user();

        // Generate a unique reference
        $reference = 'DEP' . time() . strtoupper(substr(uniqid(), -6));

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'title' => ucfirst($request->method) . ' Deposit',
            'description' => 'Funds deposited via ' . $request->method,
            'amount' => $request->amount,
            'status' => 'pending',
            'method' => $request->method,
            'reference' => $reference,
            'metadata' => [
                'currency' => $request->currency,
                'wallet_address' => $request->wallet_address,
                'crypto_type' => $request->crypto_type,
            ],
        ]);

        return redirect()->route('deposit')
            ->with('success', 'Deposit request submitted successfully! Reference: ' . $reference);
    }

    public function generateCryptoAddress(Request $request)
    {
        $request->validate([
            'crypto_type' => 'required|string|in:bitcoin,ethereum,usdt,usdc',
            'amount' => 'required|numeric|min:10',
        ]);

        // In a real application, you would generate a unique crypto address here
        // For demo purposes, we'll return static addresses
        $addresses = [
            'bitcoin' => 'bc1qvntpvkhresleqz9jwkny4a0ln2zdx00zpeuc92',
            'ethereum' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
            'usdt' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
            'usdc' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
        ];

        return response()->json([
            'success' => true,
            'address' => $addresses[$request->crypto_type],
            'amount' => $request->amount,
            'crypto_type' => $request->crypto_type,
        ]);
    }
}
