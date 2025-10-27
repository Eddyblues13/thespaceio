@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title text-dark"><i class="fas fa-edit mr-2"></i>Edit Testimonial</h4>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Customer Name *</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $testimonial->name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country *</label>
                                            <input type="text" class="form-control" id="country" name="country"
                                                value="{{ old('country', $testimonial->country) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_type">Transaction Type *</label>
                                            <select class="form-control" id="transaction_type" name="transaction_type"
                                                required>
                                                <option value="bought" {{ old('transaction_type', $testimonial->
                                                    transaction_type) == 'bought' ? 'selected' : '' }}>Bought</option>
                                                <option value="rented" {{ old('transaction_type', $testimonial->
                                                    transaction_type) == 'rented' ? 'selected' : '' }}>Rented</option>
                                                <option value="sold" {{ old('transaction_type', $testimonial->
                                                    transaction_type) == 'sold' ? 'selected' : '' }}>Sold</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount ($) *</label>
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                value="{{ old('amount', $testimonial->amount) }}" step="0.01" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="testimonial">Testimonial *</label>
                                    <textarea class="form-control" id="testimonial" name="testimonial" rows="4"
                                        required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Testimonial
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