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
                                <button type="button" class="btn btn-primary btn-block mb-2" data-toggle="modal"
                                    data-target="#fundModal">
                                    <i class="fas fa-plus-circle"></i> Add Funds
                                </button>

                                <button type="button" class="btn btn-danger btn-block mb-2" data-toggle="modal"
                                    data-target="#withdrawalModal">
                                    <i class="fas fa-minus-circle"></i> Add Withdrawal
                                </button>

                                <button type="button" class="btn btn-info btn-block mb-2" data-toggle="modal"
                                    data-target="#totalProfitModal">
                                    <i class="fas fa-chart-line"></i> Add Total Profit
                                </button>

                                <button type="button" class="btn btn-success btn-block mb-2" data-toggle="modal"
                                    data-target="#withdrawalBonusModal">
                                    <i class="fas fa-gift"></i> Add Withdrawal Bonus
                                </button>

                                <button type="button" class="btn btn-secondary btn-block mb-2" data-toggle="modal"
                                    data-target="#referralBonusModal">
                                    <i class="fas fa-user-friends"></i> Add Referral Bonus
                                </button>

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
                <h5 class="modal-title" id="fundModalLabel">Add Funds to {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.fund', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Funds</button>
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
                <h5 class="modal-title" id="withdrawalModalLabel">Add Withdrawal for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.withdrawal', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
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
                    <button type="submit" class="btn btn-danger">Add Withdrawal</button>
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
                <h5 class="modal-title" id="totalProfitModalLabel">Add Total Profit for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.total-profit', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
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
                    <button type="submit" class="btn btn-info">Add Total Profit</button>
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
                <h5 class="modal-title" id="withdrawalBonusModalLabel">Add Withdrawal Bonus for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.withdrawal-bonus', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
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
                    <button type="submit" class="btn btn-success">Add Withdrawal Bonus</button>
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
                <h5 class="modal-title" id="referralBonusModalLabel">Add Referral Bonus for {{ $user->full_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.users.referral-bonus', $user) }}" method="POST">
                @csrf
                <div class="modal-body">
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
                    <button type="submit" class="btn btn-secondary">Add Referral Bonus</button>
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

@include('admin.footer')