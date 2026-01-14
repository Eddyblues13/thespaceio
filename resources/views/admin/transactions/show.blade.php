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
                                    <td><strong class="text-{{ $transaction->type == 'deposit' ? 'success' : 'danger' }}">${{ number_format($transaction->amount, 2) }}</strong></td>
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
                        <div class="card-header">
                            <h4 class="card-title">Quick Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-edit"></i> Edit Transaction
                                </a>
                                
                                @if($transaction->status == 'pending')
                                    <form action="{{ route('admin.transactions.approve', $transaction) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="fas fa-check"></i> Approve Transaction
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.transactions.reject', $transaction) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to reject this transaction?');">
                                            <i class="fas fa-times"></i> Reject Transaction
                                        </button>
                                    </form>
                                @endif
                                
                                <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash"></i> Delete Transaction
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

