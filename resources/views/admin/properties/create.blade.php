@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-plus-circle mr-2"></i>Add New Property</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
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
                        <span>Add New</span>
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
                            <h4 class="card-title">Property Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.properties.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Property Title *</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" value="{{ old('title') }}"
                                                placeholder="Enter property title" required>
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
                                                <option value="">Select Property Type</option>
                                                <option value="buy" {{ old('type')=='buy' ? 'selected' : '' }}>For Sale
                                                </option>
                                                <option value="rent" {{ old('type')=='rent' ? 'selected' : '' }}>For
                                                    Rent</option>
                                                <option value="sale" {{ old('type')=='sale' ? 'selected' : '' }}>Sold
                                                </option>
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
                                        placeholder="Enter property description"
                                        required>{{ old('description') }}</textarea>
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
                                                name="price" value="{{ old('price') }}" step="0.01" min="0"
                                                placeholder="0.00" required>
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
                                                id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}" min="0"
                                                max="20" placeholder="0" required>
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
                                                id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}" min="0"
                                                max="20" placeholder="0" required>
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
                                                id="square_feet" name="square_feet" value="{{ old('square_feet') }}"
                                                min="0" placeholder="0" required>
                                            @error('square_feet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="main_image">Main Image *</label>
                                            <input type="file"
                                                class="form-control @error('main_image') is-invalid @enderror"
                                                id="main_image" name="main_image" accept="image/*" required>
                                            <small class="form-text text-muted">
                                                This will be the featured image displayed in listings. Max: 5MB
                                            </small>
                                            @error('main_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="images">Additional Carousel Images</label>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror"
                                        id="images" name="images[]" multiple accept="image/*">
                                    <small class="form-text text-muted">
                                        You can select multiple images for the property carousel. Max: 5MB per image
                                    </small>
                                    @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                name="address" value="{{ old('address') }}"
                                                placeholder="Enter street address" required>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                id="city" name="city" value="{{ old('city') }}" placeholder="Enter city"
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
                                                id="state" name="state" value="{{ old('state') }}"
                                                placeholder="Enter state" required>
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
                                                id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                                placeholder="Enter ZIP code" required>
                                            @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input" type="checkbox" id="featured"
                                                    name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                                <label class="form-check-label font-weight-bold" for="featured">
                                                    <i class="fas fa-star text-warning"></i> Mark as Featured Property
                                                </label>
                                                <small class="form-text text-muted d-block">
                                                    Featured properties will be highlighted on the homepage
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save"></i> Create Property
                                    </button>
                                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
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