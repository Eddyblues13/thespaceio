<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
