@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-edit mr-2"></i>Edit Property</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.properties.index') }}">Properties</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <span>Edit {{ $property->title }}</span>
                    </li>
                </ul>
            </div>

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

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Property Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.properties.update', $property) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Property Title *</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title', $property->title) }}"
                                                required>
                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Property Type *</label>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type"
                                                name="type" required>
                                                <option value="buy" {{ old('type', $property->type) == 'buy' ?
                                                    'selected' : '' }}>For Sale</option>
                                                <option value="rent" {{ old('type', $property->type) == 'rent' ?
                                                    'selected' : '' }}>For Rent</option>
                                                <option value="sale" {{ old('type', $property->type) == 'sale' ?
                                                    'selected' : '' }}>Sold</option>
                                            </select>
                                            @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="4"
                                        required>{{ old('description', $property->description) }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price ($) *</label>
                                            <input type="number"
                                                class="form-control @error('price') is-invalid @enderror" id="price"
                                                name="price" value="{{ old('price', $property->price) }}" step="0.01"
                                                required>
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bedrooms">Bedrooms *</label>
                                            <input type="number"
                                                class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms', $property->bedrooms) }}" required>
                                            @error('bedrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bathrooms">Bathrooms *</label>
                                            <input type="number"
                                                class="form-control @error('bathrooms') is-invalid @enderror"
                                                id="bathrooms" name="bathrooms"
                                                value="{{ old('bathrooms', $property->bathrooms) }}" required>
                                            @error('bathrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="square_feet">Square Feet *</label>
                                            <input type="number"
                                                class="form-control @error('square_feet') is-invalid @enderror"
                                                id="square_feet" name="square_feet"
                                                value="{{ old('square_feet', $property->square_feet) }}" required>
                                            @error('square_feet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_image">Update Main Image</label>
                                            <input type="file"
                                                class="form-control @error('main_image') is-invalid @enderror"
                                                id="main_image" name="main_image" accept="image/*">
                                            <small class="form-text text-muted">
                                                Select new main image to replace existing one. Max: 5MB
                                            </small>
                                            @error('main_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Current Main Image -->
                                @if($property->main_image)
                                <div class="form-group">
                                    <label>Current Main Image:</label>
                                    <div class="row">
                                        <div class="col-md-2 mb-2">
                                            <img src="{{ $property->main_image_url }}" class="img-thumbnail"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="checkbox" name="remove_main_image"
                                                    value="1" id="remove_main_image">
                                                <label class="form-check-label text-danger" for="remove_main_image">
                                                    <i class="fas fa-trash"></i> Remove main image
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="images">Add More Carousel Images</label>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror"
                                        id="images" name="images[]" multiple accept="image/*">
                                    <small class="form-text text-muted">
                                        Select new images to add to carousel. Max: 5MB per image
                                    </small>
                                    @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Current Carousel Images -->
                                @if($property->images && count($property->images) > 0)
                                <div class="form-group">
                                    <label>Current Carousel Images:</label>
                                    <div class="row">
                                        @foreach($property->images as $index => $image)
                                        <div class="col-md-2 mb-2">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="checkbox" name="remove_images[]"
                                                    value="{{ $index }}" id="remove_image_{{ $index }}">
                                                <label class="form-check-label text-danger"
                                                    for="remove_image_{{ $index }}">
                                                    <i class="fas fa-trash"></i> Remove
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                name="address" value="{{ old('address', $property->address) }}"
                                                required>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                id="city" name="city" value="{{ old('city', $property->city) }}"
                                                required>
                                            @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State *</label>
                                            <input type="text" class="form-control @error('state') is-invalid @enderror"
                                                id="state" name="state" value="{{ old('state', $property->state) }}"
                                                required>
                                            @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip_code">ZIP Code *</label>
                                            <input type="text"
                                                class="form-control @error('zip_code') is-invalid @enderror"
                                                id="zip_code" name="zip_code"
                                                value="{{ old('zip_code', $property->zip_code) }}" required>
                                            @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="featured"
                                                    name="featured" value="1" {{ old('featured', $property->featured) ?
                                                'checked' : '' }}>
                                                <label class="form-check-label font-weight-bold" for="featured">
                                                    <i class="fas fa-star text-warning"></i> Featured Property
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save"></i> Update Property
                                    </button>
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
                                    <a href="{{ route('properties.show', $property) }}" class="btn btn-info"
                                        target="_blank">
                                        <i class="fas fa-eye"></i> View on Site
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')