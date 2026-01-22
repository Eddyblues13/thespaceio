<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.transactions.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:deposit,withdrawal,investment,dividend',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed',
            'method' => 'required|string|max:255',
        ]);

        Transaction::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'status' => $request->status,
            'method' => $request->method,
            'reference' => 'TXN_' . time() . '_' . rand(1000, 9999),
            'processed_at' => $request->status === 'completed' ? now() : null,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('user');
        return view('admin.transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $users = User::all();
        return view('admin.transactions.edit', compact('transaction', 'users'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:deposit,withdrawal,investment,dividend',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed',
            'method' => 'required|string|max:255',
        ]);

        $transaction->update([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'status' => $request->status,
            'method' => $request->method,
            'processed_at' => $request->status === 'completed' ? now() : null,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function approve(Transaction $transaction)
    {
        // Only approve pending transactions
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending transactions can be approved.');
        }

        $transaction->update([
            'status' => 'completed',
            'processed_at' => now(),
        ]);

        $message = $transaction->type === 'withdrawal' 
            ? 'Withdrawal approved successfully. Funds have been deducted from user account.'
            : 'Transaction approved successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function reject(Transaction $transaction)
    {
        // Only reject pending transactions
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending transactions can be rejected.');
        }

        $transaction->update([
            'status' => 'failed',
            'processed_at' => now(),
        ]);

        $message = $transaction->type === 'withdrawal' 
            ? 'Withdrawal rejected successfully. User funds remain unchanged.'
            : 'Transaction rejected successfully.';

        return redirect()->back()->with('success', $message);
    }
}
