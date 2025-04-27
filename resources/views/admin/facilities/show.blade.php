<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Facility Details</h5>
                            <div>
                                <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.facilities.index') }}" class="btn btn-light btn-sm">
                                    Back to Facilities
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                @if($facility->image)
                                    <img src="{{ Storage::url($facility->image) }}" alt="{{ $facility->name }}" class="img-fluid rounded">
                                @else
                                    <div class="bg-secondary text-white p-5 text-center rounded">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>No image available</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $facility->name }}</h4>
                                <p class="text-muted mb-4">
                                    @if($facility->is_available)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Unavailable</span>
                                    @endif
                                </p>
                                
                                <h5>Description</h5>
                                <p>{{ $facility->description }}</p>
                                
                                <h5>Price</h5>
                                <p>₹{{ $facility->price_per_hour }} per hour</p>
                                
                                <h5>Created on</h5>
                                <p>{{ $facility->created_at->format('F d, Y') }}</p>
                                
                                <h5>Last Updated</h5>
                                <p>{{ $facility->updated_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('admin.facilities.destroy', $facility) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this facility? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete this Facility
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 