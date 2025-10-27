@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard Overview</h4>
            </div>

            <!-- Stats Cards Row -->
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Users</p>
                                        <h4 class="card-title">{{ $stats['totalUsers'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-home"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Properties</p>
                                        <h4 class="card-title">{{ $stats['totalProperties'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Featured Properties</p>
                                        <h4 class="card-title">{{ $stats['featuredProperties'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-warning card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Testimonials</p>
                                        <h4 class="card-title">{{ $stats['totalTestimonials'] ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Quick Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="btn btn-primary btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-users fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Users</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.properties.index') }}"
                                        class="btn btn-info btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-home fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Properties</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.testimonials.index') }}"
                                        class="btn btn-success btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-comment fa-2x mb-2"></i>
                                            <span class="btn-label">Manage Testimonials</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-md-3 mb-3">
                                    <a href="{{ route('admin.homepage.edit') }}"
                                        class="btn btn-warning btn-block square-btn">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="fas fa-cog fa-2x mb-2"></i>
                                            <span class="btn-label">Homepage Settings</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Recent Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentUsers as $user)
                                        <tr>
                                            <td>{{ $user->name ?? 'N/A' }}</td>
                                            <td>{{ $user->email ?? 'N/A' }}</td>
                                            <td>{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No users found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-dark">Recent Properties</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentProperties as $property)
                                        <tr>
                                            <td>{{ Str::limit($property->title ?? 'N/A', 30) }}</td>
                                            <td>
                                                @if(isset($property->type))
                                                <span
                                                    class="badge badge-{{ $property->type == 'sale' ? 'primary' : ($property->type == 'rent' ? 'success' : 'info') }}">
                                                    {{ ucfirst($property->type) }}
                                                </span>
                                                @else
                                                <span class="badge badge-secondary">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($property->price))
                                                ${{ number_format($property->price) }}
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No properties found</td>
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

@include('admin.footer')