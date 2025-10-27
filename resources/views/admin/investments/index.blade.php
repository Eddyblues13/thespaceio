@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="title1 text-dark">Investments Management</h1>
                    <a href="{{ route('admin.investments.create') }}" class="btn btn-success btn-sm">+ Add
                        Investment</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>User</th>
                                    <th>Plan Name</th>
                                    <th>Amount</th>
                                    <th>Returns</th>
                                    <th>Current Value</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($investments as $investment)
                                <tr>
                                    <td>{{ $investment->user->full_name ?? 'N/A' }}</td>
                                    <td>{{ $investment->plan_name }}</td>
                                    <td>${{ number_format($investment->amount, 2) }}</td>
                                    <td>${{ number_format($investment->returns, 2) }}</td>
                                    <td>${{ number_format($investment->current_value, 2) }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $investment->status == 'active' ? 'success' : ($investment->status == 'completed' ? 'info' : 'danger') }}">
                                            {{ ucfirst($investment->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $investment->start_date->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.investments.show', $investment) }}"
                                            class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.investments.edit', $investment) }}"
                                            class="btn btn-sm btn-outline-info">Edit</a>
                                        <form action="{{ route('admin.investments.destroy', $investment) }}"
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
                                    <td colspan="8" class="text-center">No investments found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            {{ $investments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')