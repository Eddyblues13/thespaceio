<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use App\Mail\WithdrawalNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        // Generate a unique reference similar to deposit
        $reference = 'WD' . time() . strtoupper(substr(uniqid(), -6));

        // Build description based on method
        $description = 'Funds withdrawn via ' . $request->method;
        if ($request->method === 'crypto' && $request->wallet_address) {
            $description .= ' to ' . substr($request->wallet_address, 0, 10) . '...';
        } elseif ($request->method === 'bank' && $request->bank_account) {
            $description .= ' to ' . $request->bank_account;
        } elseif ($request->method === 'wire' && $request->account_holder) {
            $description .= ' to ' . $request->account_holder;
        } elseif ($request->method === 'cashapp' && $request->cashapp_username) {
            $description .= ' to ' . $request->cashapp_username;
        }

        // Prepare metadata with all withdrawal details
        $metadata = [
            'currency' => $request->currency ?? 'USD',
            'wallet_address' => $request->wallet_address ?? null,
            'bank_account' => $request->bank_account ?? null,
            'wire_type' => $request->wire_type ?? null,
            'account_holder' => $request->account_holder ?? null,
            'account_number' => $request->has('account_number') ? substr($request->account_number, -4) : null, // Store only last 4 digits for security
            'routing_number' => $request->routing_number ?? null,
            'bank_name' => $request->bank_name ?? null,
            'cashapp_username' => $request->cashapp_username ?? null,
        ];

        // Create withdrawal transaction
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'withdrawal',
            'title' => ucfirst($request->method) . ' Withdrawal',
            'description' => $description,
            'amount' => -abs($request->amount), // Ensure negative amount
            'status' => 'pending',
            'method' => $request->method,
            'reference' => $reference,
            'metadata' => $metadata,
        ]);

        // Send withdrawal notification email
        try {
            Mail::to($user->email)->send(new WithdrawalNotification($user, $transaction));
        } catch (\Exception $e) {
            // Log error but don't fail the withdrawal request
            \Log::error('Failed to send withdrawal notification email: ' . $e->getMessage());
        }

        return redirect()->route('dashboard.withdrawal')
            ->with('success', 'Withdrawal request submitted successfully! Reference: ' . $reference . '. A confirmation email has been sent to your email address.');
    }
}
