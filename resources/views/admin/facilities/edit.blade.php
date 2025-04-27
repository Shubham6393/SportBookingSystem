<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Facility</h5>
                            <a href="{{ route('admin.facilities.index') }}" class="btn btn-light btn-sm">
                                Back to Facilities
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Facility Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $facility->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $facility->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="price_per_hour" class="form-label">Price Per Hour (₹)</label>
                                <input type="number" step="0.01" class="form-control @error('price_per_hour') is-invalid @enderror" id="price_per_hour" name="price_per_hour" value="{{ old('price_per_hour', $facility->price_per_hour) }}" required>
                                @error('price_per_hour')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Facility Image</label>
                                @if($facility->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($facility->image) }}" alt="{{ $facility->name }}" class="img-thumbnail" style="max-height: 200px;">
                                        <p class="small text-muted">Current image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                <small class="form-text text-muted">Leave empty to keep current image. Recommended size: 800x600 pixels. Max size: 2MB</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" {{ old('is_available', $facility->is_available) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_available">Available for booking</label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Facility</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 