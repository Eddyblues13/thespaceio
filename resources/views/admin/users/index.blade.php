@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h4 class="page-title text-dark mb-2">
                            <i class="fas fa-users mr-2 text-primary"></i>Manage Users
                        </h4>
                        <p class="text-muted mb-0">Search, view, and manage all registered users</p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm mb-2">
                        <i class="fas fa-plus mr-1"></i> Add New User
                    </a>
                </div>
            </div>

            <!-- Search and Filter Card -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3">
                        <div class="col-md-10 col-lg-11">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" 
                                       name="search" 
                                       class="form-control form-control-lg" 
                                       placeholder="Search by name, email, phone, or referral code..." 
                                       value="{{ request('search') }}"
                                       autofocus>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-1">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-search d-md-none"></i>
                                <span class="d-none d-md-inline">Search</span>
                            </button>
                        </div>
                        @if(request('search'))
                        <div class="col-12">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-times mr-1"></i> Clear Search
                            </a>
                            <span class="text-muted ml-2">
                                <strong>{{ $users->total() }}</strong> result(s) found
                            </span>
                        </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Users Table Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-list mr-2 text-primary"></i>Users List
                        </h5>
                        <span class="badge badge-primary badge-pill">{{ $users->total() }} Total</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">
                                        <i class="fas fa-user mr-1"></i>Name
                                    </th>
                                    <th class="border-top-0 d-none d-md-table-cell">
                                        <i class="fas fa-envelope mr-1"></i>Email
                                    </th>
                                    <th class="border-top-0 d-none d-lg-table-cell">
                                        <i class="fas fa-phone mr-1"></i>Phone
                                    </th>
                                    <th class="border-top-0 d-none d-md-table-cell">
                                        <i class="fas fa-calendar mr-1"></i>Joined
                                    </th>
                                    <th class="border-top-0">
                                        <i class="fas fa-info-circle mr-1"></i>Status
                                    </th>
                                    <th class="border-top-0 text-center" style="min-width: 150px;">
                                        <i class="fas fa-cog mr-1"></i>Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr class="user-row">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px; font-weight: bold;">
                                                {{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($user->last_name ?? '', 0, 1)) }}
                                            </div>
                                            <div>
                                                <strong class="text-dark">{{ $user->full_name ?? 'N/A' }}</strong>
                                                <br>
                                                <small class="text-muted d-md-none">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="mailto:{{ $user->email }}" class="text-primary">
                                            {{ $user->email }}
                                        </a>
                                    </td>
                                    <td class="d-none d-lg-table-cell">
                                        {{ $user->full_phone ?? 'N/A' }}
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <i class="far fa-calendar-alt mr-1 text-muted"></i>
                                        {{ $user->created_at->format('M d, Y') }}
                                        <br>
                                        <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td>
                                        @if($user->is_admin ?? false)
                                        <span class="badge badge-danger badge-pill">
                                            <i class="fas fa-shield-alt mr-1"></i>Admin
                                        </span>
                                        @else
                                        <span class="badge badge-success badge-pill">
                                            <i class="fas fa-check-circle mr-1"></i>Active
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="btn btn-outline-primary" 
                                                title="View Details"
                                                data-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                                <span class="d-none d-lg-inline ml-1">View</span>
                                            </a>
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="btn btn-outline-info" 
                                                title="Edit User"
                                                data-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                                <span class="d-none d-lg-inline ml-1">Edit</span>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user) }}" 
                                                  method="POST"
                                                  class="d-inline" 
                                                  onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-outline-danger" 
                                                        title="Delete User"
                                                        data-toggle="tooltip">
                                                    <i class="fas fa-trash"></i>
                                                    <span class="d-none d-lg-inline ml-1">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="empty-state">
                                            <i class="fas fa-users fa-4x text-muted mb-3"></i>
                                            <h5 class="text-muted">No users found</h5>
                                            @if(request('search'))
                                            <p class="text-muted mb-3">Try adjusting your search criteria</p>
                                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-arrow-left mr-1"></i> View All Users
                                            </a>
                                            @else
                                            <p class="text-muted mb-3">Get started by adding your first user</p>
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">
                                                <i class="fas fa-plus mr-1"></i> Add New User
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($users->hasPages())
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="text-muted mb-2 mb-md-0">
                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                        </div>
                        <div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    /* Enhanced Styles */
    .user-row {
        transition: all 0.2s ease;
    }

    .user-row:hover {
        background-color: #f8f9fa;
        transform: translateX(2px);
    }

    .avatar-sm {
        font-size: 14px;
    }

    .empty-state {
        padding: 2rem;
    }

    .card {
        border: none;
        border-radius: 10px;
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #6c757d;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody td {
        vertical-align: middle;
        border-bottom: 1px solid #f0f0f0;
    }

    .btn-group-sm .btn {
        border-radius: 5px;
        margin: 0 2px;
    }

    .input-group-text {
        border: none;
    }

    .form-control:focus {
        border-color: #0052a3;
        box-shadow: 0 0 0 0.2rem rgba(0, 82, 163, 0.25);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .page-header h4 {
            font-size: 1.25rem;
        }

        .page-header p {
            font-size: 0.875rem;
        }

        .card-body {
            padding: 1rem;
        }

        .table {
            font-size: 0.875rem;
        }

        .table th,
        .table td {
            padding: 0.75rem 0.5rem;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .avatar-sm {
            width: 35px !important;
            height: 35px !important;
            font-size: 12px;
        }

        .badge {
            font-size: 0.7rem;
            padding: 0.3rem 0.5rem;
        }

        .input-group-lg .form-control {
            font-size: 1rem;
            padding: 0.5rem 0.75rem;
        }
    }

    @media (max-width: 576px) {
        .page-inner {
            padding: 10px;
        }

        .card {
            margin-bottom: 1rem;
        }

        .table {
            font-size: 0.8rem;
        }

        .table th,
        .table td {
            padding: 0.5rem 0.25rem;
        }

        .btn-group-sm .btn {
            padding: 0.2rem 0.4rem;
            font-size: 0.7rem;
        }

        .btn-group-sm .btn i {
            margin-right: 0 !important;
        }

        .btn-group-sm .btn span {
            display: none;
        }

        .empty-state {
            padding: 1rem;
        }

        .empty-state i {
            font-size: 3rem !important;
        }

        .col-md-10,
        .col-md-2 {
            padding-left: 5px;
            padding-right: 5px;
        }
    }

    /* Pagination Styles */
    .pagination {
        margin-bottom: 0;
    }

    .pagination .page-link {
        color: #0052a3;
        border-color: #dee2e6;
    }

    .pagination .page-link:hover {
        background-color: #0052a3;
        color: white;
        border-color: #0052a3;
    }

    .pagination .page-item.active .page-link {
        background-color: #0052a3;
        border-color: #0052a3;
    }
</style>

<script>
    // Initialize tooltips
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@include('admin.footer')
