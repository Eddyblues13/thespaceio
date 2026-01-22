<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use App\Mail\AdminUserEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('referral_code', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'country_code' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        $user->load(['transactions', 'investments']);
        
        // Calculate all balances similar to user portfolio
        $investments = $user->investments;
        $totalInvestment = $investments->sum('current_value');
        $totalReturns = $investments->sum('returns');
        
        // Get admin-added bonuses/profit from transactions
        $dividends = $user->transactions()->dividends()->completed();
        
        $adminTotalProfit = (clone $dividends)
            ->where('title', 'Total Profit')
            ->sum('amount');
        
        $withdrawalBonus = (clone $dividends)
            ->where('title', 'Withdrawal Bonus')
            ->sum('amount');
        
        $referralBonus = (clone $dividends)
            ->where('title', 'Referral Bonus')
            ->sum('amount');
        
        // Total Profit = investment returns + admin-added total profit
        $totalProfit = $totalReturns + $adminTotalProfit;
        
        // Portfolio value = current investment value + realised profit + bonuses
        $portfolioValue = $totalInvestment + $totalProfit + $withdrawalBonus + $referralBonus;
        
        // Cash balance from all completed transactions
        $cashBalance = $user->cash_balance;
        
        // Get admin-added funds (deposits by admin)
        $adminAddedFunds = $user->transactions()
            ->deposits()
            ->completed()
            ->where('method', 'admin')
            ->sum('amount');
        
        $balances = [
            'cash_balance' => $cashBalance,
            'portfolio_value' => $portfolioValue,
            'total_investment' => $totalInvestment,
            'total_profit' => $totalProfit,
            'admin_total_profit' => $adminTotalProfit,
            'withdrawal_bonus' => $withdrawalBonus,
            'referral_bonus' => $referralBonus,
            'admin_added_funds' => $adminAddedFunds,
        ];
        
        return view('admin.users.show', compact('user', 'balances'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'country_code' => 'nullable|string|max:5',
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'is_admin' => $request->has('is_admin'),
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function loginAs(User $user)
    {
        // Logout admin first
        Auth::guard('admin')->logout();
        
        // Login as user
        Auth::guard('web')->login($user);
        
        return redirect('/user/dashboard')->with('success', 'Logged in as ' . $user->full_name);
    }

    public function addFunds(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'action' => 'required|in:add,reduce',
        ]);

        $action = $request->action ?? 'add';
        $amount = $action === 'reduce' ? -abs($request->amount) : abs($request->amount);
        $title = $action === 'reduce' ? 'Admin Fund Reduction' : 'Admin Fund Addition';

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'deposit',
            'title' => $title,
            'description' => $request->description,
            'amount' => $amount,
            'status' => 'completed',
            'method' => 'admin',
            'reference' => 'ADMIN_' . time(),
            'processed_at' => now(),
        ]);

        $message = $action === 'reduce' 
            ? 'Funds reduced successfully.' 
            : 'Funds added successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function addWithdrawal(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'method' => 'required|string|max:255',
            'status' => 'nullable|in:pending,completed,failed',
            'action' => 'required|in:add,reduce',
        ]);

        $action = $request->action ?? 'add';
        $status = $request->status ?? 'pending';
        
        // For withdrawals: add = negative (reduces balance), reduce = positive (increases balance)
        $amount = $action === 'reduce' ? abs($request->amount) : -abs($request->amount);
        $title = $action === 'reduce' ? 'Admin Withdrawal Reduction' : 'Admin Withdrawal';

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'withdrawal',
            'title' => $title,
            'description' => $request->description,
            'amount' => $amount,
            'status' => $status,
            'method' => $request->method,
            'reference' => 'WD_' . time() . '_' . rand(1000, 9999),
            'processed_at' => $status === 'completed' ? now() : null,
        ]);

        $message = $action === 'reduce' 
            ? ($status === 'completed' ? 'Withdrawal reduced and processed successfully.' : 'Withdrawal reduced successfully.')
            : ($status === 'completed' ? 'Withdrawal added and processed successfully.' : 'Withdrawal added successfully.');

        return redirect()->back()->with('success', $message);
    }

    public function addTotalProfit(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'action' => 'required|in:add,reduce',
        ]);

        $action = $request->action ?? 'add';
        $amount = $action === 'reduce' ? -abs($request->amount) : abs($request->amount);
        $title = 'Total Profit';

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'dividend',
            'title' => $title,
            'description' => $request->description,
            'amount' => $amount,
            'status' => 'completed',
            'method' => 'admin',
            'reference' => 'TP_' . time(),
            'processed_at' => now(),
        ]);

        $message = $action === 'reduce' 
            ? 'Total profit reduced successfully.' 
            : 'Total profit added successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function addWithdrawalBonus(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'action' => 'required|in:add,reduce',
        ]);

        $action = $request->action ?? 'add';
        $amount = $action === 'reduce' ? -abs($request->amount) : abs($request->amount);
        $title = 'Withdrawal Bonus';

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'dividend',
            'title' => $title,
            'description' => $request->description,
            'amount' => $amount,
            'status' => 'completed',
            'method' => 'admin',
            'reference' => 'WB_' . time(),
            'processed_at' => now(),
        ]);

        $message = $action === 'reduce' 
            ? 'Withdrawal bonus reduced successfully.' 
            : 'Withdrawal bonus added successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function addReferralBonus(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
            'action' => 'required|in:add,reduce',
        ]);

        $action = $request->action ?? 'add';
        $amount = $action === 'reduce' ? -abs($request->amount) : abs($request->amount);
        $title = 'Referral Bonus';

        Transaction::create([
            'user_id' => $user->id,
            'type' => 'dividend',
            'title' => $title,
            'description' => $request->description,
            'amount' => $amount,
            'status' => 'completed',
            'method' => 'admin',
            'reference' => 'RB_' . time(),
            'processed_at' => now(),
        ]);

        $message = $action === 'reduce' 
            ? 'Referral bonus reduced successfully.' 
            : 'Referral bonus added successfully.';

        return redirect()->back()->with('success', $message);
    }

    public function sendEmail(Request $request, User $user)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::to($user->email)->send(new AdminUserEmail($request->subject, $request->message));

        return redirect()->back()->with('success', 'Email sent successfully.');
    }

    public function userTransactions(User $user)
    {
        $transactions = $user->transactions()->latest()->paginate(10);
        return view('admin.users.transactions', compact('user', 'transactions'));
    }

    public function userInvestments(User $user)
    {
        $investments = $user->investments()->latest()->paginate(10);
        return view('admin.users.investments', compact('user', 'investments'));
    }
}
