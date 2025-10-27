<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Investment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalUsers' => User::count(),
            'totalTransactions' => Transaction::count(),
            'totalInvestments' => Investment::count(),
            'pendingTransactions' => Transaction::where('status', 'pending')->count(),
            'completedTransactions' => Transaction::where('status', 'completed')->count(),
            'totalDeposits' => Transaction::where('type', 'deposit')->sum('amount'),
            'totalWithdrawals' => Transaction::where('type', 'withdrawal')->sum('amount'),
        ];

        $recentUsers = User::latest()->take(5)->get();
        $recentTransactions = Transaction::with('user')->latest()->take(5)->get();
        $recentInvestments = Investment::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentTransactions', 'recentInvestments'));
    }
}
