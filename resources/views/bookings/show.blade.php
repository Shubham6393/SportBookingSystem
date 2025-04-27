<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">Booking Details</h2>
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Bookings
            </a>
        </div>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Booking #{{ $booking->id }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-white">Booking Information</h5>
                        <table class="table table-bordered text-white">
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($booking->status == 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($booking->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Booking Date</th>
                                <td>{{ $booking->booking_date->format('M d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Time Slot</th>
                                <td>{{ date('h:i A', strtotime($booking->start_time)) }} - {{ date('h:i A', strtotime($booking->end_time)) }}</td>
                            </tr>
                            <tr>
                                <th>Total Price</th>
                                <td>₹{{ $booking->total_price }}</td>
                            </tr>
                            @if($booking->notes)
                            <tr>
                                <th>Notes</th>
                                <td>{{ $booking->notes }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Booked On</th>
                                <td>{{ $booking->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        @if($booking->facility)
                            <h5 class="text-white">Facility Details</h5>
                            <table class="table table-bordered text-white">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $booking->facility->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $booking->facility->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>₹{{ $booking->facility->price_per_hour }}/hour</td>
                                </tr>
                            </table>
                        @endif
                        
                        @if($booking->equipment)
                            <h5 class="text-white">Equipment Details</h5>
                            <table class="table table-bordered text-white">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $booking->equipment->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $booking->equipment->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>₹{{ $booking->equipment->price_per_day }}/day</td>
                                </tr>
                            </table>
                        @endif
                    </div>
                </div>
                
                @if($booking->status != 'cancelled')
                    <div class="mt-4">
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                <i class="fas fa-times"></i> Cancel Booking
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 