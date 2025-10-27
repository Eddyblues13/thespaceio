@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-cog mr-2"></i>Homepage Settings</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <form action="{{ route('admin.homepage.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <h5 class="mb-3">Hero Section</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="hero_title">Hero Title *</label>
                                            <input type="text" class="form-control" id="hero_title" name="hero_title"
                                                value="{{ old('hero_title', $homepageData['hero_title'] ?? '') }}"
                                                required>
                                            <small class="form-text text-muted">Main headline on the homepage</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="hero_subtitle">Hero Subtitle</label>
                                    <textarea class="form-control" id="hero_subtitle" name="hero_subtitle"
                                        rows="2">{{ old('hero_subtitle', $homepageData['hero_subtitle'] ?? '') }}</textarea>
                                    <small class="form-text text-muted">Subtitle text below the main headline</small>
                                </div>

                                <hr class="my-4">
                                <h5 class="mb-3">About Section</h5>
                                <div class="form-group">
                                    <label for="about_title">About Title *</label>
                                    <input type="text" class="form-control" id="about_title" name="about_title"
                                        value="{{ old('about_title', $homepageData['about_title'] ?? '') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="about_content">About Content *</label>
                                    <textarea class="form-control" id="about_content" name="about_content" rows="6"
                                        required>{{ old('about_content', $homepageData['about_content'] ?? '') }}</textarea>
                                    <small class="form-text text-muted">Description text for the about section</small>
                                </div>

                                <hr class="my-4">
                                <h5 class="mb-3">Company Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp Number *</label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                                value="{{ old('whatsapp', $homepageData['company_contact']['whatsapp'] ?? '') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_email">Company Email *</label>
                                            <input type="email" class="form-control" id="company_email"
                                                name="company_email"
                                                value="{{ old('company_email', $homepageData['company_contact']['email'] ?? '') }}"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('admin.home') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Current Homepage Preview -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Current Homepage Preview</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i>
                                These settings control the content displayed on the main homepage. Changes will be
                                visible to all visitors.
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Hero Section:</h6>
                                    <p><strong>Title:</strong> {{ $homepageData['hero_title'] ?? 'Not set' }}</p>
                                    <p><strong>Subtitle:</strong> {{ $homepageData['hero_subtitle'] ?? 'Not set' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Contact Info:</h6>
                                    <p><strong>WhatsApp:</strong> {{ $homepageData['company_contact']['whatsapp'] ??
                                        'Not set' }}</p>
                                    <p><strong>Email:</strong> {{ $homepageData['company_contact']['email'] ?? 'Not set'
                                        }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')