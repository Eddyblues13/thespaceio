@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-comment mr-2"></i>Manage Testimonials</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">All Testimonials</h4>
                                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add Testimonial
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Country</th>
                                            <th>Transaction</th>
                                            <th>Amount</th>
                                            <th>Testimonial</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->country }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $testimonial->transaction_type == 'bought' ? 'success' : ($testimonial->transaction_type == 'rented' ? 'info' : 'warning') }}">
                                                    {{ ucfirst($testimonial->transaction_type) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($testimonial->amount) }}</td>
                                            <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                                            <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this testimonial?')"
                                                        title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $testimonials->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')