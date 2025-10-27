<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::with('user')->latest()->paginate(10);
        return view('admin.investments.index', compact('investments'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.investments.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'returns' => 'required|numeric|min:0',
            'current_value' => 'required|numeric|min:0.01',
            'status' => 'required|in:active,completed,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        Investment::create($request->all());

        return redirect()->route('admin.investments.index')->with('success', 'Investment created successfully.');
    }

    public function show(Investment $investment)
    {
        $investment->load('user');
        return view('admin.investments.show', compact('investment'));
    }

    public function edit(Investment $investment)
    {
        $users = User::all();
        return view('admin.investments.edit', compact('investment', 'users'));
    }

    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'returns' => 'required|numeric|min:0',
            'current_value' => 'required|numeric|min:0.01',
            'status' => 'required|in:active,completed,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        $investment->update($request->all());

        return redirect()->route('admin.investments.index')->with('success', 'Investment updated successfully.');
    }

    public function destroy(Investment $investment)
    {
        $investment->delete();
        return redirect()->route('admin.investments.index')->with('success', 'Investment deleted successfully.');
    }
}
