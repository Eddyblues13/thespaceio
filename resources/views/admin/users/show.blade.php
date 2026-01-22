@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="mt-2 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="title1 text-dark">User Details: {{ $user->full_name }}</h1>
                    <div>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">Back to Users</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- User Information -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Full Name:</th>
                                    <td>{{ $user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $user->full_phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Referral Code:</th>
                                    <td>{{ $user->referral_code }}</td>
                                </tr>
                                <tr>
                                    <th>Referred By:</th>
                                    <td>{{ $user->referrer->full_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Joined Date:</th>
                                    <td>{{ $user->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        @if($user->is_admin)
                                        <span class="badge badge-danger">Admin</span>
                                        @else
                                        <span class="badge badge-success">User</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Quick Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <form action="{{ route('admin.users.login-as', $user) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-block mb-2">Login as User</button>
                                </form>
                                <div class="btn-group btn-block mb-2" role="group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#fundModal" data-action="add">
                                        <i class="fas fa-plus-circle"></i> Add Funds
                                    </button>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#fundModal" data-action="reduce">
                                        <i class="fas fa-minus-circle"></i> Reduce Funds
                                    </button>
                                </div>

                                <div class="btn-group btn-block mb-2" role="group">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#withdrawalModal" data-action="add">
                                        <i class="fas fa-plus-circle"></i> Add Withdrawal
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                        data-target="#withdrawalModal" data-action="reduce">
                                        <i class="fas fa-minus-circle"></i> Reduce Withdrawal
                                    </button>
                                </div>

                                <div class="btn-group btn-block mb-2" role="group">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#totalProfitModal" data-action="add">
                                        <i class="fas fa-plus-circle"></i> Add Total Profit
                                    </button>
                                    <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                        data-target="#totalProfitModal" data-action="reduce">
                                        <i class="fas fa-minus-circle"></i> Reduce Total Profit
                                    </button>
                                </div>

                                <div class="btn-group btn-block mb-2" role="group">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#withdrawalBonusModal" data-action="add">
                                        <i class="fas fa-plus-circle"></i> Add Withdrawal Bonus
                                    </button>
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#withdrawalBonusModal" data-action="reduce">
                                        <i class="fas fa-minus-circle"></i> Reduce Withdrawal Bonus
                                    </button>
                                </div>

                                <div class="btn-group btn-block mb-2" role="group">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#referralBonusModal" data-action="add">
                                        <i class="fas fa-plus-circle"></i> Add Referral Bonus
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                        data-target="#referralBonusModal" data-action="reduce">
                                        <i class="fas fa-minus-circle"></i> Reduce Referral Bonus
                                    </button>
                                </div>

                                <button type="button" class="btn btn-info btn-block mb-2" data-toggle="modal"
                                    data-target="#emailModal">
                                    <i class="fas fa-envelope"></i> Send Email
                                </button>

                                <a href="{{ route('admin.users.transactions', $user) }}"
                                    class="btn btn-success btn-block mb-2">
                                    View Transactions
                                </a>

                                <a href="{{ route('admin.users.investments', $user) }}"
                                    class="btn btn-dark btn-block mb-2">
                                    View Investments
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Balances Section -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">
                                <i class="fas fa-wallet mr-2"></i>User Balances & Portfolio
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Cash Balance -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <i class="fas fa-money-bill-wave fa-2x text-success mb-2"></i>
                                            <h5 class="text-muted mb-1">Cash Balance</h5>
                                            <h3 class="text-success mb-0">${{ number_format(max(0, $balances['cash_balance']), 2) }}</h3>
                                            <small class="text-muted">Available for withdrawal</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Portfolio Value -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <i class="fas fa-chart-pie fa-2x text-primary mb-2"></i>
                                            <h5 class="text-muted mb-1">Portfolio Value</h5>
                                            <h3 class="text-primary mb-0">${{ number_format(max(0, $balances['portfolio_value']), 2) }}</h3>
                                            <small class="text-muted">Total portfolio worth</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Investment -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <i class="fas fa-chart-line fa-2x text-info mb-2"></i>
                                            <h5 class="text-muted mb-1">Total Investment</h5>
                                            <h3 class="text-info mb-0">${{ number_format(max(0, $balances['total_investment']), 2) }}</h3>
                                            <small class="text-muted">Current investment value</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Profit -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <i class="fas fa-trophy fa-2x text-warning mb-2"></i>
                                            <h5 class="text-muted mb-1">Total Profit</h5>
                                            <h3 class="text-warning mb-0">${{ number_format(max(0, $balances['total_profit']), 2) }}</h3>
                                            <small class="text-muted">Investment + Admin profit</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Admin-Added Balances -->
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5 class="mb-3">
                                        <i class="fas fa-user-shield mr-2 text-primary"></i>Admin-Added Balances
                                    </h5>
                                </div>
                                
                                <!-- Admin Added Funds -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card border-primary">
                                        <div class="card-body text-center">
                                            <i class="fas fa-plus-circle fa-2x text-primary mb-2"></i>
                                            <h6 class="text-muted mb-1">Admin Added Funds</h6>
                                            <h4 class="text-primary mb-0">${{ number_format(max(0, $balances['admin_added_funds']), 2) }}</h4>
                                            <small class="text-muted">Total funds added by admin</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Admin Total Profit -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card border-info">
                                        <div class="card-body text-center">
                                            <i class="fas fa-chart-line fa-2x text-info mb-2"></i>
                                            <h6 class="text-muted mb-1">Admin Total Profit</h6>
                                            <h4 class="text-info mb-0">${{ number_format(max(0, $balances['admin_total_profit']), 2) }}</h4>
                                            <small class="text-muted">Profit added by admin</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Withdrawal Bonus -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card border-success">
                                        <div class="card-body text-center">
                                            <i class="fas fa-gift fa-2x text-success mb-2"></i>
                                            <h6 class="text-muted mb-1">Withdrawal Bonus</h6>
                                            <h4 class="text-success mb-0">${{ number_format(max(0, $balances['withdrawal_bonus']), 2) }}</h4>
                                            <small class="text-muted">Bonus added by admin</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Referral Bonus -->
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card border-secondary">
                                        <div class="card-body text-center">
                                            <i class="fas fa-user-friends fa-2x text-secondary mb-2"></i>
                                            <h6 class="text-muted mb-1">Referral Bonus</h6>
                                            <h4 class="text-secondary mb-0">${{ number_format(max(0, $balances['referral_bonus']), 2) }}</h4>
                                            <small class="text-muted">Referral bonus added</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Stats -->
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card card-stats card-primary card-round">
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
                                        <h4 class="card-title">{{ $user->transactions->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-stats card-info card-round">
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
                                        <h4 class="card-title">{{ $user->investments->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Investment</p>
                                        <h4 class="card-title">${{ number_format($user->total_investment, 2) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Returns</p>
                                        <h4 class="card-title">${{ number_format($user->total_returns, 2) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Recent Transactions</h4>
                                <a href="{{ route('admin.users.transactions', $user) }}"
                                    class="btn btn-sm btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user->transactions->take(5) as $transaction)
                                        <tr>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $transaction->type == 'deposit' ? 'success' : ($transaction->type == 'withdrawal' ? 'danger' : 'info') }}">
                                                    {{ ucfirst($transaction->type) }}
                                                </span>
                                            </td>
                                            <td>{{ $transaction->title }}</td>
                                            <td>${{ number_format($transaction->amount, 2) }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $transaction->status == 'completed' ? 'success' : ($transaction->status == 'pending' ? 'warning' : 'danger') }}">
                                                    {{ ucfirst($transaction->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No transactions found</td>
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

<!-- Fund Modal -->
<div class="modal fade" id="fundModal" tabindex="-1" role="dialog" aria-labelledby="fundModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fundModalLabel">Manage Funds for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.fund', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="action" id="fundAction" value="add">
                <div class="modal-body">
                    <div class="alert alert-info" id="fundActionAlert">
                        <i class="fas fa-info-circle"></i> <span id="fundActionText">Adding funds to user account</span>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" min="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="fundSubmitBtn">Add Funds</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Withdrawal Modal -->
<div class="modal fade" id="withdrawalModal" tabindex="-1" role="dialog" aria-labelledby="withdrawalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawalModalLabel">Manage Withdrawal for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.withdrawal', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="action" id="withdrawalAction" value="add">
                <div class="modal-body">
                    <div class="alert alert-info" id="withdrawalActionAlert">
                        <i class="fas fa-info-circle"></i> <span id="withdrawalActionText">Adding withdrawal (reduces balance)</span>
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_amount">Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min="0.01" class="form-control @error('amount') is-invalid @enderror" 
                               id="withdrawal_amount" name="amount" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_method">Payment Method <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('method') is-invalid @enderror" 
                               id="withdrawal_method" name="method" required placeholder="e.g., Bank Transfer, PayPal">
                        @error('method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="withdrawal_description" name="description" rows="3" required></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_status">Status</label>
                        <select class="form-control" id="withdrawal_status" name="status">
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="withdrawalSubmitBtn">Add Withdrawal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Total Profit Modal -->
<div class="modal fade" id="totalProfitModal" tabindex="-1" role="dialog" aria-labelledby="totalProfitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="totalProfitModalLabel">Manage Total Profit for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.total-profit', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="action" id="totalProfitAction" value="add">
                <div class="modal-body">
                    <div class="alert alert-info" id="totalProfitActionAlert">
                        <i class="fas fa-info-circle"></i> <span id="totalProfitActionText">Adding total profit to user account</span>
                    </div>
                    <div class="form-group">
                        <label for="total_profit_amount">Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min="0.01" class="form-control" id="total_profit_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="total_profit_description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="total_profit_description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" id="totalProfitSubmitBtn">Add Total Profit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Withdrawal Bonus Modal -->
<div class="modal fade" id="withdrawalBonusModal" tabindex="-1" role="dialog" aria-labelledby="withdrawalBonusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawalBonusModalLabel">Manage Withdrawal Bonus for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.withdrawal-bonus', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="action" id="withdrawalBonusAction" value="add">
                <div class="modal-body">
                    <div class="alert alert-info" id="withdrawalBonusActionAlert">
                        <i class="fas fa-info-circle"></i> <span id="withdrawalBonusActionText">Adding withdrawal bonus to user account</span>
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_bonus_amount">Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min="0.01" class="form-control" id="withdrawal_bonus_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="withdrawal_bonus_description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="withdrawal_bonus_description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="withdrawalBonusSubmitBtn">Add Withdrawal Bonus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Referral Bonus Modal -->
<div class="modal fade" id="referralBonusModal" tabindex="-1" role="dialog" aria-labelledby="referralBonusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="referralBonusModalLabel">Manage Referral Bonus for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.referral-bonus', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="action" id="referralBonusAction" value="add">
                <div class="modal-body">
                    <div class="alert alert-info" id="referralBonusActionAlert">
                        <i class="fas fa-info-circle"></i> <span id="referralBonusActionText">Adding referral bonus to user account</span>
                    </div>
                    <div class="form-group">
                        <label for="referral_bonus_amount">Amount <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" min="0.01" class="form-control" id="referral_bonus_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="referral_bonus_description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="referral_bonus_description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary" id="referralBonusSubmitBtn">Add Referral Bonus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Send Email to {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.send-email', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Handle Fund Modal
    $('#fundModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action') || 'add';
        var modal = $(this);
        
        modal.find('#fundAction').val(action);
        
        if (action === 'reduce') {
            modal.find('#fundModalLabel').text('Reduce Funds from ' + '{{ $user->full_name }}');
            modal.find('#fundActionText').text('Reducing funds from user account');
            modal.find('#fundActionAlert').removeClass('alert-info').addClass('alert-warning');
            modal.find('#fundSubmitBtn').removeClass('btn-primary').addClass('btn-warning').text('Reduce Funds');
        } else {
            modal.find('#fundModalLabel').text('Add Funds to ' + '{{ $user->full_name }}');
            modal.find('#fundActionText').text('Adding funds to user account');
            modal.find('#fundActionAlert').removeClass('alert-warning').addClass('alert-info');
            modal.find('#fundSubmitBtn').removeClass('btn-warning').addClass('btn-primary').text('Add Funds');
        }
    });

    // Handle Withdrawal Modal
    $('#withdrawalModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action') || 'add';
        var modal = $(this);
        
        modal.find('#withdrawalAction').val(action);
        
        if (action === 'reduce') {
            modal.find('#withdrawalModalLabel').text('Reduce Withdrawal for ' + '{{ $user->full_name }}');
            modal.find('#withdrawalActionText').text('Reducing withdrawal (increases balance)');
            modal.find('#withdrawalActionAlert').removeClass('alert-info').addClass('alert-warning');
            modal.find('#withdrawalSubmitBtn').removeClass('btn-danger').addClass('btn-warning').text('Reduce Withdrawal');
        } else {
            modal.find('#withdrawalModalLabel').text('Add Withdrawal for ' + '{{ $user->full_name }}');
            modal.find('#withdrawalActionText').text('Adding withdrawal (reduces balance)');
            modal.find('#withdrawalActionAlert').removeClass('alert-warning').addClass('alert-info');
            modal.find('#withdrawalSubmitBtn').removeClass('btn-warning').addClass('btn-danger').text('Add Withdrawal');
        }
    });

    // Handle Total Profit Modal
    $('#totalProfitModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action') || 'add';
        var modal = $(this);
        
        modal.find('#totalProfitAction').val(action);
        
        if (action === 'reduce') {
            modal.find('#totalProfitModalLabel').text('Reduce Total Profit for ' + '{{ $user->full_name }}');
            modal.find('#totalProfitActionText').text('Reducing total profit from user account');
            modal.find('#totalProfitActionAlert').removeClass('alert-info').addClass('alert-warning');
            modal.find('#totalProfitSubmitBtn').removeClass('btn-info').addClass('btn-warning').text('Reduce Total Profit');
        } else {
            modal.find('#totalProfitModalLabel').text('Add Total Profit for ' + '{{ $user->full_name }}');
            modal.find('#totalProfitActionText').text('Adding total profit to user account');
            modal.find('#totalProfitActionAlert').removeClass('alert-warning').addClass('alert-info');
            modal.find('#totalProfitSubmitBtn').removeClass('btn-warning').addClass('btn-info').text('Add Total Profit');
        }
    });

    // Handle Withdrawal Bonus Modal
    $('#withdrawalBonusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action') || 'add';
        var modal = $(this);
        
        modal.find('#withdrawalBonusAction').val(action);
        
        if (action === 'reduce') {
            modal.find('#withdrawalBonusModalLabel').text('Reduce Withdrawal Bonus for ' + '{{ $user->full_name }}');
            modal.find('#withdrawalBonusActionText').text('Reducing withdrawal bonus from user account');
            modal.find('#withdrawalBonusActionAlert').removeClass('alert-info').addClass('alert-warning');
            modal.find('#withdrawalBonusSubmitBtn').removeClass('btn-success').addClass('btn-warning').text('Reduce Withdrawal Bonus');
        } else {
            modal.find('#withdrawalBonusModalLabel').text('Add Withdrawal Bonus for ' + '{{ $user->full_name }}');
            modal.find('#withdrawalBonusActionText').text('Adding withdrawal bonus to user account');
            modal.find('#withdrawalBonusActionAlert').removeClass('alert-warning').addClass('alert-info');
            modal.find('#withdrawalBonusSubmitBtn').removeClass('btn-warning').addClass('btn-success').text('Add Withdrawal Bonus');
        }
    });

    // Handle Referral Bonus Modal
    $('#referralBonusModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var action = button.data('action') || 'add';
        var modal = $(this);
        
        modal.find('#referralBonusAction').val(action);
        
        if (action === 'reduce') {
            modal.find('#referralBonusModalLabel').text('Reduce Referral Bonus for ' + '{{ $user->full_name }}');
            modal.find('#referralBonusActionText').text('Reducing referral bonus from user account');
            modal.find('#referralBonusActionAlert').removeClass('alert-info').addClass('alert-warning');
            modal.find('#referralBonusSubmitBtn').removeClass('btn-secondary').addClass('btn-warning').text('Reduce Referral Bonus');
        } else {
            modal.find('#referralBonusModalLabel').text('Add Referral Bonus for ' + '{{ $user->full_name }}');
            modal.find('#referralBonusActionText').text('Adding referral bonus to user account');
            modal.find('#referralBonusActionAlert').removeClass('alert-warning').addClass('alert-info');
            modal.find('#referralBonusSubmitBtn').removeClass('btn-warning').addClass('btn-secondary').text('Add Referral Bonus');
        }
    });
</script>

@include('admin.footer')