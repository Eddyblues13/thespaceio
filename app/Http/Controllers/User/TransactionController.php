<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = $user->transactions()->latest();

        // Filter by type
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $transactions = $query->paginate(10);

        // Calculate summary accurately
        $completedDeposits = $user->transactions()->deposits()->completed();
        $completedWithdrawals = $user->transactions()->withdrawals()->completed();
        $pendingTransactions = $user->transactions()->pending();
        
        $summary = [
            'total_deposits' => $completedDeposits->sum('amount'),
            'total_withdrawals' => abs($completedWithdrawals->sum('amount')), // Withdrawals are negative
            'pending_transactions' => $pendingTransactions->count(),
            'pending_amount' => abs($pendingTransactions->sum('amount')), // Handle negative amounts
            'monthly_deposits' => $completedDeposits
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('amount'),
            'monthly_withdrawals' => abs($completedWithdrawals
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('amount')), // Withdrawals are negative
        ];

        return view('dashboard.transactions', compact('user', 'transactions', 'summary'));
    }

    public function storeDeposit(Request $request)
    {
        return $this->storeTransaction($request, 'deposit');
    }

    public function storeWithdrawal(Request $request)
    {
        return $this->storeTransaction($request, 'withdrawal');
    }

    private function storeTransaction(Request $request, $type)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($type === 'withdrawal' && $user->cash_balance < $request->amount) {
            return back()->withErrors(['amount' => 'Insufficient funds for withdrawal']);
        }

        Transaction::create([
            'user_id' => $user->id,
            'type' => $type,
            'title' => ucfirst($request->method) . ' ' . ucfirst($type),
            'description' => $request->notes ?: 'Funds ' . $type . 'ed via ' . $request->method,
            'amount' => $type === 'deposit' ? $request->amount : -$request->amount,
            'status' => 'pending',
            'method' => $request->method,
        ]);

        $message = ucfirst($type) . ' request submitted successfully!';

        return redirect()->route('dashboard.transactions')->with('success', $message);
    }
}
