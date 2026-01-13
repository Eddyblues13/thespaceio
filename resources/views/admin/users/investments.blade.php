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
                        <h4 class="page-title text-dark"><i class="fas fa-chart-line mr-2"></i>Investments for {{ $user->full_name }}</h4>
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
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Current Value</th>
                                    <th>Returns</th>
                                    <th>Return %</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($investments as $investment)
                                <tr>
                                    <td><strong>{{ $investment->name }}</strong></td>
                                    <td>
                                        <span class="badge badge-info">{{ $investment->type }}</span>
                                    </td>
                                    <td><strong>${{ number_format($investment->amount, 2) }}</strong></td>
                                    <td><strong>${{ number_format($investment->current_value, 2) }}</strong></td>
                                    <td>
                                        <span class="badge badge-{{ $investment->returns >= 0 ? 'success' : 'danger' }}">
                                            ${{ number_format($investment->returns, 2) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $investment->return_percentage >= 0 ? 'success' : 'danger' }}">
                                            {{ number_format($investment->return_percentage, 2) }}%
                                        </span>
                                    </td>
                                    <td>{{ $investment->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No investments found for this user.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($investments->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $investments->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

