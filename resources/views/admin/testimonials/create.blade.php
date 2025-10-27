@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-plus-circle mr-2"></i>Add New Testimonial</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.testimonials.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Customer Name *</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country *</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                value="{{ old('country') }}" required>
                                            @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_type">Transaction Type *</label>
                                            <select class="form-control" id="transaction_type" name="transaction_type"
                                                required>
                                                <option value="bought" {{ old('transaction_type')=='bought' ? 'selected'
                                                    : '' }}>Bought</option>
                                                <option value="rented" {{ old('transaction_type')=='rented' ? 'selected'
                                                    : '' }}>Rented</option>
                                                <option value="sold" {{ old('transaction_type')=='sold' ? 'selected'
                                                    : '' }}>Sold</option>
                                            </select>
                                            @error('transaction_type')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount ($) *</label>
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                value="{{ old('amount') }}" step="0.01" required>
                                            @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="testimonial">Testimonial *</label>
                                    <textarea class="form-control" id="testimonial" name="testimonial" rows="4"
                                        required>{{ old('testimonial') }}</textarea>
                                    @error('testimonial')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Create Testimonial
                                    </button>
                                    <a href="{{ route('admin.testimonials.index') }}"
                                        class="btn btn-secondary">Cancel</a>
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