<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $investments = $user->investments;

        $totalInvestment = $investments->sum('current_value');
        $totalReturns = $investments->sum('returns');
        $returnPercentage = $totalInvestment > 0 ? ($totalReturns / $totalInvestment) * 100 : 0;

        $investmentData = [
            'total_investment' => $totalInvestment,
            'cash_balance' => $user->cash_balance,
            'monthly_return' => $user->transactions()
                ->where('type', 'dividend')
                ->whereMonth('created_at', now()->month)
                ->sum('amount'),
            'monthly_return_percentage' => 1.33,
            'total_returns' => $totalReturns,
            'return_percentage' => $returnPercentage,
        ];

        $performanceData = $this->getPerformanceData();
        $allocationData = $this->getAllocationData($investments);

        return view('dashboard.investments', compact('user', 'investments', 'investmentData', 'performanceData', 'allocationData'));
    }

    private function getPerformanceData()
    {
        return [
            'ytd_return' => 18.7,
            'one_year_return' => 24.3,
            'sharpe_ratio' => 1.12,
            'volatility' => 14.2,
            'beta' => 0.94,
            'dividends_ytd' => 2450,
        ];
    }

    private function getAllocationData($investments)
    {
        $totalValue = $investments->sum('current_value');
        $colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#06b6d4'];

        return $investments->map(function ($investment, $index) use ($totalValue, $colors) {
            return [
                'name' => $investment->name,
                'percentage' => $totalValue > 0 ? ($investment->current_value / $totalValue) * 100 : 0,
                'value' => $investment->current_value,
                'color' => $colors[$index % count($colors)],
            ];
        });
    }
}
