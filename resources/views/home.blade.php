<x-app-layout>
    <section class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(to right, #4776E6, #8E54E9); box-shadow: 0 4px 20px rgba(71, 118, 230, 0.4);">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('https://source.unsplash.com/1600x900/?sports,abstract'); background-size: cover; background-position: center; opacity: 0.1;"></div>
        
        <!-- Animated Shapes -->
        <div class="position-absolute" style="width: 300px; height: 300px; border-radius: 40%; background: linear-gradient(45deg, rgba(0, 201, 255, 0.3), rgba(146, 254, 157, 0.3)); filter: blur(60px); top: -100px; right: -100px; animation: float 8s ease-in-out infinite;"></div>
        <div class="position-absolute" style="width: 200px; height: 200px; border-radius: 30%; background: linear-gradient(45deg, rgba(252, 70, 107, 0.2), rgba(63, 94, 251, 0.2)); filter: blur(40px); bottom: -50px; left: -50px; animation: float 6s ease-in-out infinite alternate;"></div>
        
        <div class="container position-relative" style="z-index: 1;">
            <h1 class="display-4 fw-bold mb-3" style="text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);">Welcome to Sports Leasing</h1>
            <p class="lead mb-4">Your One-Stop Destination for Sports Facilities and Equipment Rental</p>
            @guest
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn me-2" style="background: linear-gradient(to right, #FC466B, #3F5EFB); border: none; color: white; box-shadow: 0 4px 15px rgba(252, 70, 107, 0.4); padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 8px; transition: all 0.3s ease;">
                        <i class="fas fa-sign-in-alt me-1"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn" style="background: linear-gradient(to right, #00C9FF, #92FE9D); border: none; color: #0f172a; box-shadow: 0 4px 15px rgba(0, 201, 255, 0.4); padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 8px; transition: all 0.3s ease;">
                        <i class="fas fa-user-plus me-1"></i> Register
                    </a>
                </div>
            @endguest
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Available Facilities</h2>
            
            @if($facilities->isEmpty())
                <div class="alert alert-info">
                    No facilities available at the moment. Please check back later.
                </div>
            @else
                <div class="row">
                    @foreach($facilities as $facility)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @php
                                    $imageName = '';
                                    switch(strtolower($facility->name)) {
                                        case 'cricket ground':
                                            $imageName = 'Cricketground.png';
                                            break;
                                        case 'field hockey ground':
                                            $imageName = 'feildhockeyground.png';
                                            break;
                                        case 'football ground':
                                            $imageName = 'footballground.png';
                                            break;
                                        case 'tennis court':
                                            $imageName = 'tennis court.png';
                                            break;
                                        case 'badminton court':
                                            $imageName = 'badminton court.png';
                                            break;
                                        case 'kabaddi ground':
                                            $imageName = 'kabbadigroud.png';
                                            break;
                                        case 'kho-kho ground':
                                            $imageName = 'khokho ground.png';
                                            break;
                                        case 'athletics track':
                                            $imageName = 'athelictictrack.png';
                                            break;
                                        case 'basketball court':
                                            $imageName = 'basketballcourt.png';
                                            break;
                                        case 'volleyball court':
                                            $imageName = 'volleyballcourt.png';
                                            break;
                                        default:
                                            $imageName = '';
                                    }
                                    $imagePath = '/images/' . $imageName;
                                @endphp
                                <div style="height: 200px; background-color: #203a43; overflow: hidden;">
                                    <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $facility->name }}" 
                                         style="height: 100%; width: 100%; object-fit: cover;"
                                         onerror="this.style.display='none'; this.parentNode.innerHTML = '<div class=\'d-flex justify-content-center align-items-center h-100 text-white\'><i class=\'fas fa-dumbbell fa-2x me-2\'></i> {{ $facility->name }}</div>';"
                                         loading="lazy">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $facility->name }}</h5>
                                    <p class="card-text">{{ Str::limit($facility->description, 100) }}</p>
                                    <p class="card-text text-primary fw-bold">₹{{ $facility->price_per_hour }}/hour</p>
                                </div>
                                <div class="card-footer bg-white border-top-0">
                                    <a href="{{ route('bookings.create', ['facility_id' => $facility->id]) }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Available Equipment</h2>
            
            @if($equipment->isEmpty())
                <div class="alert alert-info">
                    No equipment available at the moment. Please check back later.
                </div>
            @else
                <div class="row">
                    @foreach($equipment as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @php
                                    $imageName = strtolower(str_replace(' ', '_', $item->name)) . '.jpg';
                                    $imagePath = '/images/' . $imageName;
                                @endphp
                                <div style="height: 200px; background-color: #203a43; overflow: hidden;">
                                    <img src="{{ asset($imagePath) }}" class="card-img-top" alt="{{ $item->name }}" 
                                         style="height: 100%; width: 100%; object-fit: cover;"
                                         onerror="this.style.display='none'; this.parentNode.innerHTML = '<div class=\'d-flex justify-content-center align-items-center h-100 text-white\'><i class=\'fas fa-volleyball-ball fa-2x me-2\'></i> {{ $item->name }}</div>';"
                                         loading="lazy">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                                    <p class="card-text text-primary fw-bold">₹{{ $item->price_per_day }}/day</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $item->quantity_available }} available</small>
                                    </p>
                                </div>
                                <div class="card-footer bg-white border-top-0">
                                    <a href="{{ route('bookings.create', ['equipment_id' => $item->id]) }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Why Choose Us?</h2>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i> 
                            Wide variety of sports facilities and equipment
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i> 
                            Easy online booking system
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i> 
                            Affordable rates with no hidden fees
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i> 
                            Clean and well-maintained facilities
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i> 
                            Professional customer service
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/random/600x400/?sports,facilities,premium" alt="Sports Facility" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
</x-app-layout> 