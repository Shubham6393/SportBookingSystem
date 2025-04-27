<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4 text-white">Admin Dashboard</h2>
        
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <h3 class="card-text">{{ $totalUsers }}</h3>
                        <p class="mb-0">Registered accounts</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Facilities</h5>
                        <h3 class="card-text">{{ $totalFacilities }}</h3>
                        <p class="mb-0">Available for booking</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Equipment</h5>
                        <h3 class="card-text">{{ $totalEquipment }}</h3>
                        <p class="mb-0">Items for rent</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Total Bookings</h5>
                        <h3 class="card-text">{{ $totalBookings }}</h3>
                        <p class="mb-0">Made by users</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card bg-dark">
                    <div class="card-header d-flex justify-content-between align-items-center text-white">
                        <h5 class="mb-0">Recent Bookings</h5>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body">
                        @if($recentBookings->isEmpty())
                            <p class="text-white">No bookings found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-dark text-white">
                                    <thead>
                                        <tr>
                                            <th class="text-white">ID</th>
                                            <th class="text-white">User</th>
                                            <th class="text-white">Item</th>
                                            <th class="text-white">Date</th>
                                            <th class="text-white">Status</th>
                                            <th class="text-white">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentBookings as $booking)
                                            <tr>
                                                <td class="text-white">{{ $booking->id }}</td>
                                                <td class="text-white">{{ $booking->user->name }}</td>
                                                <td class="text-white">
                                                    @if($booking->facility)
                                                        Facility: {{ $booking->facility->name }}
                                                    @elseif($booking->equipment)
                                                        Equipment: {{ $booking->equipment->name }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="text-white">{{ $booking->booking_date->format('M d, Y') }}</td>
                                                <td class="text-white">
                                                    @if($booking->status == 'confirmed')
                                                        <span class="badge bg-success">Confirmed</span>
                                                    @elseif($booking->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @else
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @endif
                                                </td>
                                                <td class="text-white">₹{{ $booking->total_price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Manage Facilities</h5>
                        <div>
                            <a href="{{ route('admin.facilities.create') }}" class="btn btn-sm btn-success">Add New</a>
                            <a href="{{ route('admin.facilities.index') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-white">Manage sports facilities including:</p>
                        <ul class="text-white">
                            <li>Add new facilities</li>
                            <li>Update facility information</li>
                            <li>Set availability and pricing</li>
                            <li>Upload facility images</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Manage Equipment</h5>
                        <div>
                            <a href="{{ route('admin.equipment.create') }}" class="btn btn-sm btn-success">Add New</a>
                            <a href="{{ route('admin.equipment.index') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-white">Manage sports equipment including:</p>
                        <ul class="text-white">
                            <li>Add new equipment</li>
                            <li>Update equipment details</li>
                            <li>Set quantity and pricing</li>
                            <li>Upload equipment images</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Messages</h5>
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-primary">
                            View All 
                            @if($unreadMessages > 0)
                                <span class="badge bg-danger">{{ $unreadMessages }}</span>
                            @endif
                        </a>
                    </div>
                    <div class="card-body">
                        @if($unreadMessages > 0)
                            <div class="alert alert-info">
                                <i class="fas fa-envelope"></i> You have {{ $unreadMessages }} unread message(s). <a href="{{ route('admin.messages.index') }}">View them now</a>.
                            </div>
                        @else
                            <p class="text-white">No new messages.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table.text-white tr,
        .table.text-white th,
        .table.text-white td {
            color: white !important;
        }
        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        .table-striped > tbody > tr:nth-of-type(even) {
            background-color: rgba(30, 41, 59, 0.8);
        }
        .table-striped > tbody > tr:hover {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
</x-app-layout> 