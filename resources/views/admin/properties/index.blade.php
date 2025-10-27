@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-home mr-2"></i>Manage Properties</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">All Properties</h4>
                                <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add Property
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

                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Main Image</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Location</th>
                                            <th>Bed/Bath</th>
                                            <th>Featured</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($properties as $property)
                                        <tr>
                                            <td>
                                                @if($property->main_image)
                                                <img src="{{ $property->main_image_url }}" alt="{{ $property->title }}"
                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                                @else
                                                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                                                    alt="{{ $property->title }}"
                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($property->title, 30) }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $property->type == 'sale' ? 'primary' : ($property->type == 'rent' ? 'success' : 'info') }}">
                                                    {{ ucfirst($property->type) }}
                                                </span>
                                            </td>
                                            <td>{{ $property->formatted_price }}</td>
                                            <td>{{ $property->city }}, {{ $property->state }}</td>
                                            <td>
                                                <small>{{ $property->bedrooms }}bd / {{ $property->bathrooms
                                                    }}ba</small>
                                            </td>
                                            <td>
                                                @if($property->featured)
                                                <span class="badge badge-success">Yes</span>
                                                @else
                                                <span class="badge badge-secondary">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('properties.show', $property) }}"
                                                    class="btn btn-sm btn-info" target="_blank" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.properties.edit', $property) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.properties.destroy', $property) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this property?')"
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
                                {{ $properties->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')