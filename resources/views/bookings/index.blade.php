<x-app-layout>
    <style>
        .table tr:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }
        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            color: white !important;
        }
    </style>
    
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">My Bookings</h2>
            <a href="{{ route('bookings.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Booking
            </a>
        </div>
        
        @if($bookings->isEmpty())
            <div class="alert alert-info">
                You don't have any bookings yet. <a href="{{ route('bookings.create') }}">Create your first booking</a>.
            </div>
        @else
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Your Booking History</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-white">
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Booking Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
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
                                        <td>{{ date('h:i A', strtotime($booking->start_time)) }} - {{ date('h:i A', strtotime($booking->end_time)) }}</td>
                                        <td>
                                            @if($booking->status == 'confirmed')
                                                <span class="badge bg-success">Confirmed</span>
                                            @elseif($booking->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td>₹{{ $booking->total_price }}</td>
                                        <td>
                                            <a href="{{ route('bookings.show', $booking) }}" class="btn btn-sm" style="background: linear-gradient(to right, #00C9FF, #92FE9D); color: #0f172a; font-weight: 600;">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            
                                            @if($booking->status != 'cancelled')
                                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="background: linear-gradient(to right, #FC466B, #3F5EFB); color: white; font-weight: 600;" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout> 