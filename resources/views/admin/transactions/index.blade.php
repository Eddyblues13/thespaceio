@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="title1 text-dark">Transactions Management</h1>
                    <a href="{{ route('admin.transactions.create') }}" class="btn btn-success btn-sm">+ Add
                        Transaction</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>User</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Method</th>
                                    <th>Date</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->user->full_name ?? 'N/A' }}</td>
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
                                    <td>{{ $transaction->method }}</td>
                                    <td>{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.transactions.show', $transaction) }}"
                                            class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.transactions.edit', $transaction) }}"
                                            class="btn btn-sm btn-outline-info">Edit</a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No transactions found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')