<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Equipment Details</h5>
                            <div>
                                <a href="{{ route('admin.equipment.edit', $equipment) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.equipment.index') }}" class="btn btn-light btn-sm">
                                    Back to Equipment
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-4 mb-md-0">
                                @if($equipment->image)
                                    <img src="{{ Storage::url($equipment->image) }}" alt="{{ $equipment->name }}" class="img-fluid rounded">
                                @else
                                    <div class="bg-secondary text-white p-5 text-center rounded">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>No image available</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $equipment->name }}</h4>
                                <p class="text-muted mb-4">
                                    @if($equipment->is_available)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Unavailable</span>
                                    @endif
                                </p>
                                
                                <h5>Description</h5>
                                <p>{{ $equipment->description }}</p>
                                
                                <h5>Price</h5>
                                <p>₹{{ $equipment->price_per_day }} per day</p>

                                <h5>Quantity Available</h5>
                                <p>{{ $equipment->quantity_available }}</p>
                                
                                <h5>Created on</h5>
                                <p>{{ $equipment->created_at->format('F d, Y') }}</p>
                                
                                <h5>Last Updated</h5>
                                <p>{{ $equipment->updated_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('admin.equipment.destroy', $equipment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this equipment? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Delete this Equipment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 