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

            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="page-title text-dark"><i class="fas fa-exchange-alt mr-2"></i>Transaction Details</h4>
                    <div>
                        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Transactions
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Transaction Information</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px;">Transaction ID:</th>
                                    <td><strong>#{{ $transaction->id }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Reference:</th>
                                    <td><code>{{ $transaction->reference ?? 'N/A' }}</code></td>
                                </tr>
                                <tr>
                                    <th>User:</th>
                                    <td>
                                        <a href="{{ route('admin.users.show', $transaction->user) }}">
                                            <strong>{{ $transaction->user->full_name ?? 'N/A' }}</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">{{ $transaction->user->email ?? 'N/A' }}</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Type:</th>
                                    <td>
                                        <span class="badge badge-{{ $transaction->type == 'deposit' ? 'success' : ($transaction->type == 'withdrawal' ? 'danger' : 'info') }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Title:</th>
                                    <td><strong>{{ $transaction->title }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $transaction->description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td><strong class="text-{{ $transaction->type == 'deposit' ? 'success' : 'danger' }}">${{ number_format(abs($transaction->amount), 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <span class="badge badge-{{ $transaction->status == 'completed' ? 'success' : ($transaction->status == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td>{{ $transaction->method ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Created At:</th>
                                    <td>{{ $transaction->created_at->format('M d, Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At:</th>
                                    <td>{{ $transaction->updated_at->format('M d, Y H:i:s') }}</td>
                                </tr>
                                @if($transaction->processed_at)
                                <tr>
                                    <th>Processed At:</th>
                                    <td>{{ $transaction->processed_at->format('M d, Y H:i:s') }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">
                                <i class="fas fa-cog mr-2"></i>Transaction Actions
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-info btn-block">
                                    <i class="fas fa-edit mr-2"></i> Edit Transaction
                                </a>
                                
                                @if($transaction->status == 'pending')
                                    @if($transaction->type == 'withdrawal')
                                        <form action="{{ route('admin.transactions.approve', $transaction) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to approve this withdrawal? This will complete the transaction and deduct funds from the user account.');">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-block">
                                                <i class="fas fa-check-circle mr-2"></i> Approve Withdrawal
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.transactions.reject', $transaction) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to reject this withdrawal? This will mark the transaction as failed.');">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-block">
                                                <i class="fas fa-times-circle mr-2"></i> Reject Withdrawal
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.transactions.approve', $transaction) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to approve this transaction?');">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-block">
                                                <i class="fas fa-check-circle mr-2"></i> Approve Transaction
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.transactions.reject', $transaction) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to reject this transaction?');">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-block">
                                                <i class="fas fa-times-circle mr-2"></i> Reject Transaction
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <div class="alert alert-info mb-0">
                                        <small><i class="fas fa-info-circle mr-1"></i> This transaction is {{ $transaction->status }}. Only pending transactions can be approved or rejected.</small>
                                    </div>
                                @endif
                                
                                <hr>
                                
                                <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('⚠️ WARNING: Are you sure you want to DELETE this transaction? This action cannot be undone and will permanently remove the transaction from the database.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash-alt mr-2"></i> Delete Transaction
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if($transaction->metadata && count($transaction->metadata) > 0)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="card-title">Additional Details</h4>
                        </div>
                        <div class="card-body">
                            @foreach($transaction->metadata as $key => $value)
                                @if($value)
                                <div class="mb-2">
                                    <strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                                    <div class="text-muted">
                                        @if($key == 'wallet_address')
                                            <code style="word-break: break-all;">{{ $value }}</code>
                                        @elseif($key == 'account_number')
                                            ••••{{ $value }}
                                        @else
                                            {{ $value }}
                                        @endif
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

