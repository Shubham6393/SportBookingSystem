<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Equipment</h5>
                            <a href="{{ route('admin.equipment.index') }}" class="btn btn-light btn-sm">
                                Back to Equipment
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.equipment.update', $equipment) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Equipment Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $equipment->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $equipment->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="price_per_day" class="form-label">Price Per Day (₹)</label>
                                <input type="number" step="0.01" class="form-control @error('price_per_day') is-invalid @enderror" id="price_per_day" name="price_per_day" value="{{ old('price_per_day', $equipment->price_per_day) }}" required>
                                @error('price_per_day')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity_available" class="form-label">Quantity Available</label>
                                <input type="number" class="form-control @error('quantity_available') is-invalid @enderror" id="quantity_available" name="quantity_available" value="{{ old('quantity_available', $equipment->quantity_available) }}" min="0" required>
                                @error('quantity_available')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Equipment Image</label>
                                @if($equipment->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($equipment->image) }}" alt="{{ $equipment->name }}" class="img-thumbnail" style="max-height: 200px;">
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
                                <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" {{ old('is_available', $equipment->is_available) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_available">Available for booking</label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Equipment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 