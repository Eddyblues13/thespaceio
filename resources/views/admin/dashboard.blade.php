@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard Overview</h4>
            </div>

            <!-- Stats Cards Row -->
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Users</p>
                                        <h4 class="card-title">{{ $stats['totalUsers'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Transactions</p>
                                        <h4 class="card-title">{{ $stats['totalTransactions'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Investments</p>
                                        <h4 class="card-title">{{ $stats['totalInvestments'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Pending Transactions</p>
                                        <h4 class="card-title">{{ $stats['pendingTransactions'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Quick Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="btn btn-primary btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-users fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Users</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.transactions.index') }}"
                                        class="btn btn-info btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-exchange-alt fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Transactions</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.investments.index') }}"
                                        class="btn btn-success btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-chart-line fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Investments</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.users.create') }}"
                                        class="btn btn-warning btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-user-plus fa-2x mb-2"></i>
                                            <span class="btn-label">Add New User</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Recent Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentUsers as $user)
                                        <tr>
                                            <td>{{ $user->full_name ?? 'N/A' }}</td>
                                            <td>{{ $user->email ?? 'N/A' }}</td>
                                            <td>{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No users found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Recent Transactions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentTransactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->user->full_name ?? 'N/A' }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $transaction->type == 'deposit' ? 'success' : ($transaction->type == 'withdrawal' ? 'danger' : 'info') }}">
                                                    {{ ucfirst($transaction->type) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($transaction->amount, 2) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No transactions found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Recent Investments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentInvestments as $investment)
                                        <tr>
                                            <td>{{ $investment->user->full_name ?? 'N/A' }}</td>
                                            <td>{{ $investment->plan_name ?? 'N/A' }}</td>
                                            <td>${{ number_format($investment->amount, 2) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No investments found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')