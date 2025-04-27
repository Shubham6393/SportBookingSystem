<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">Booking Management</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card bg-dark text-white">
            <div class="card-header">
                <h5 class="mb-0">All Bookings</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-dark text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Item</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>
                                        @if($booking->facility)
                                            Facility: {{ $booking->facility->name }}
                                        @elseif($booking->equipment)
                                            Equipment: {{ $booking->equipment->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $booking->booking_date->format('M d, Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <div class="input-group input-group-sm">
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td>₹{{ $booking->total_price }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $booking->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        
                                        <!-- Booking Details Modal -->
                                        <div class="modal fade" id="bookingModal{{ $booking->id }}" tabindex="-1" aria-labelledby="bookingModalLabel{{ $booking->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-dark text-white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="bookingModalLabel{{ $booking->id }}">Booking #{{ $booking->id }} Details</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>User:</strong> {{ $booking->user->name }}</p>
                                                        <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                                                        <p><strong>Item:</strong> 
                                                            @if($booking->facility)
                                                                Facility: {{ $booking->facility->name }}
                                                            @elseif($booking->equipment)
                                                                Equipment: {{ $booking->equipment->name }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </p>
                                                        <p><strong>Booking Date:</strong> {{ $booking->booking_date->format('F d, Y') }}</p>
                                                        <p><strong>Time Slot:</strong> {{ $booking->time_slot ?? 'N/A' }}</p>
                                                        <p><strong>Status:</strong> 
                                                            @if($booking->status == 'confirmed')
                                                                <span class="badge bg-success">Confirmed</span>
                                                            @elseif($booking->status == 'pending')
                                                                <span class="badge bg-warning text-dark">Pending</span>
                                                            @else
                                                                <span class="badge bg-danger">Cancelled</span>
                                                            @endif
                                                        </p>
                                                        <p><strong>Total Price:</strong> ₹{{ $booking->total_price }}</p>
                                                        <p><strong>Created On:</strong> {{ $booking->created_at->format('F d, Y h:i A') }}</p>
                                                        <p><strong>Last Updated:</strong> {{ $booking->updated_at->format('F d, Y h:i A') }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No bookings found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-4">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 