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
        $transaction->update([
            'status' => 'completed',
            'processed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Transaction approved successfully.');
    }

    public function reject(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'failed',
            'processed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Transaction rejected successfully.');
    }
}
