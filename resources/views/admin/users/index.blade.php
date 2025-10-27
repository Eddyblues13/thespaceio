@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Users List</h1>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Manage Users</h4>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">+ Add User</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Joined</th>
                                    <th>Status</th>
                                    <th style="width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->full_phone ?? 'N/A' }}</td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($user->is_admin)
                                        <span class="badge badge-danger">Admin</span>
                                        @else
                                        <span class="badge badge-success">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user) }}"
                                            class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="btn btn-sm btn-outline-info">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')