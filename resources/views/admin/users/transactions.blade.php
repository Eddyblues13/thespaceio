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
                    <div>
                        <h4 class="page-title text-dark"><i class="fas fa-exchange-alt mr-2"></i>Transactions for {{ $user->full_name }}</h4>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-secondary btn-sm mb-2">
                        <i class="fas fa-arrow-left"></i> Back to User
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Method</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>
                                        <span class="badge badge-{{ $transaction->type == 'deposit' ? 'success' : ($transaction->type == 'withdrawal' ? 'danger' : 'info') }}">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </td>
                                    <td><strong>{{ $transaction->title }}</strong></td>
                                    <td>{{ \Str::limit($transaction->description, 50) }}</td>
                                    <td><strong>${{ number_format($transaction->amount, 2) }}</strong></td>
                                    <td>
                                        <span class="badge badge-{{ $transaction->status == 'completed' ? 'success' : ($transaction->status == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $transaction->method ?? 'N/A' }}</td>
                                    <td><small>{{ $transaction->reference ?? 'N/A' }}</small></td>
                                    <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No transactions found for this user.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($transactions->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $transactions->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

