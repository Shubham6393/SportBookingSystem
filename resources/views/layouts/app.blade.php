<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sports Leasing') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
                color: #f1f1f1;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }
            .min-h-screen {
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            main {
                flex: 1;
            }
            .card {
                background-color: rgba(22, 28, 45, 0.85);
                border: none;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
                border-radius: 12px;
                overflow: hidden;
                backdrop-filter: blur(5px);
            }
            .card-header {
                background: linear-gradient(to right, #4776E6, #8E54E9);
                color: white;
                border: none;
                padding: 1.2rem 1.5rem;
            }
            .card-body {
                background-color: rgba(30, 41, 59, 0.8);
                color: #f1f1f1;
                padding: 1.5rem;
            }
            .card-footer {
                background-color: rgba(17, 24, 39, 0.9);
                color: #e2e8f0;
                border-top: none;
            }
            .btn-primary {
                background: linear-gradient(to right, #00C9FF, #92FE9D);
                border: none;
                color: #0f172a;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(0, 201, 255, 0.4);
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                background: linear-gradient(to right, #00d2ff, #9dffaa);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(0, 201, 255, 0.5);
                color: #0f172a;
            }
            .btn-secondary {
                background: linear-gradient(to right, #FC466B, #3F5EFB);
                border: none;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(252, 70, 107, 0.4);
                transition: all 0.3s ease;
            }
            .btn-secondary:hover {
                background: linear-gradient(to right, #fd5a7b, #536dfb);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(252, 70, 107, 0.5);
            }
            .btn-outline-primary {
                border: 2px solid #00C9FF;
                color: #00C9FF;
                font-weight: 600;
                background: transparent;
                box-shadow: 0 4px 15px rgba(0, 201, 255, 0.2);
                transition: all 0.3s ease;
            }
            .btn-outline-primary:hover {
                background: linear-gradient(to right, #00C9FF, #92FE9D);
                border-color: transparent;
                color: #0f172a;
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(0, 201, 255, 0.4);
            }
            .form-control {
                background-color: rgba(17, 24, 39, 0.8);
                border: 1px solid #4f46e5;
                color: #f1f1f1;
                border-radius: 8px;
            }
            .form-control:focus {
                background-color: rgba(30, 41, 59, 0.9);
                color: #f1f1f1;
                border-color: #8b5cf6;
                box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.25);
            }
            .table {
                color: #f1f1f1;
                border-radius: 10px;
                overflow: hidden;
            }
            .table-bordered {
                border-color: rgba(255, 255, 255, 0.2);
            }
            .table tr:hover {
                background-color: rgba(255, 255, 255, 0.1) !important;
                color: white !important;
            }
            .table-hover tbody tr:hover {
                background-color: rgba(255, 255, 255, 0.1) !important;
                color: white !important;
            }
            .form-control:hover {
                background-color: rgba(30, 41, 59, 0.9);
                border-color: #8b5cf6;
            }
            .form-select:hover {
                background-color: rgba(30, 41, 59, 0.9);
                border-color: #8b5cf6;
            }
            select option {
                background-color: #1e293b;
                color: white;
            }
            select option:hover, 
            select option:focus, 
            select option:active, 
            select option:checked {
                background-color: #4776E6 !important;
                color: white !important;
            }
            .bg-light {
                background-color: rgba(30, 41, 59, 0.8) !important;
            }
            .bg-white {
                background-color: rgba(30, 41, 59, 0.8) !important;
            }
            .text-dark {
                color: #f1f1f1 !important;
            }
            label {
                color: #e2e8f0;
                font-weight: 500;
            }
            a {
                color: #22d3ee;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            a:hover {
                color: #67e8f9;
                text-decoration: none;
            }
            .alert {
                border: none;
                border-radius: 10px;
            }
            .alert-success {
                background: linear-gradient(to right, rgba(6, 182, 212, 0.9), rgba(52, 211, 153, 0.9));
                color: white;
            }
            .alert-danger {
                background: linear-gradient(to right, rgba(239, 68, 68, 0.9), rgba(248, 113, 113, 0.9));
                color: white;
            }
            .nav-link.active {
                background: linear-gradient(to right, #00C9FF, #92FE9D);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: bold;
            }
            .badge {
                border-radius: 6px;
                padding: 0.5em 0.7em;
            }
            .badge.bg-success {
                background: linear-gradient(to right, #10B981, #34D399) !important;
            }
            .badge.bg-warning {
                background: linear-gradient(to right, #F59E0B, #FBBF24) !important;
            }
            .badge.bg-danger {
                background: linear-gradient(to right, #EF4444, #F87171) !important;
            }
            .card:hover {
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.4);
                transform: translateY(-5px);
            }
            .dropdown-item:hover {
                background-color: rgba(71, 118, 230, 0.7) !important;
                color: white !important;
            }
            .form-check-input:hover {
                border-color: #8b5cf6;
            }
            .nav-link:hover {
                color: white !important;
                opacity: 0.9;
            }
            /* Fix for modal scrolling issues */
            .modal-dialog-scrollable .modal-content {
                max-height: 100%;
                overflow: hidden;
            }
            
            .modal-dialog-scrollable .modal-body {
                overflow-y: auto;
            }
            
            /* Ensure modals are visible and accessible on mobile */
            @media (max-width: 576px) {
                .modal-dialog {
                    margin: 0.5rem;
                    max-width: calc(100% - 1rem);
                }
            }
            
            /* Ensure close button is always visible */
            .modal-header .btn-close {
                background-color: white;
                opacity: 0.8;
            }
            
            .modal-header .btn-close:hover {
                opacity: 1;
            }

            /* Additional modal fixes */
            .modal-dialog-centered {
                display: flex;
                align-items: center;
                min-height: calc(100% - 1rem);
            }

            .modal-footer {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                justify-content: space-between;
            }

            .modal-open .modal {
                padding-right: 0 !important;
                background-color: rgba(0, 0, 0, 0.6);
            }

            .modal-backdrop {
                background-color: #000;
                opacity: 0.75 !important;
            }

            /* Ensure modal buttons are properly sized and visible */
            .modal-footer .btn {
                padding: 0.5rem 1.5rem;
                font-weight: 500;
                min-width: 120px;
            }

            .modal-body {
                padding: 1.5rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="container py-4">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                {{ $slot }}
            </main>
            
            <footer class="py-4 mt-5" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="fw-bold">Sports Leasing</h5>
                            <p>Your one-stop destination for sports ground and equipment rentals.</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-bold">Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('home') }}" class="text-white"><i class="fas fa-home me-1"></i> Home</a></li>
                                <li><a href="{{ route('bookings.index') }}" class="text-white"><i class="fas fa-calendar-check me-1"></i> My Bookings</a></li>
                                <li><a href="{{ route('contact') }}" class="text-white"><i class="fas fa-envelope me-1"></i> Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-bold">Contact Info</h5>
                            <address>
                                <i class="fas fa-map-marker-alt me-1"></i> 123 Sports Street<br>
                                Athletic City, AC 12345<br>
                                <i class="fas fa-phone me-1"></i> Phone: (123) 456-7890<br>
                                <i class="fas fa-envelope me-1"></i> Email: info@sportsleasing.com
                            </address>
                        </div>
                    </div>
                    <hr class="border-light">
                    <div class="text-center">
                        <p>&copy; {{ date('Y') }} Sports Leasing. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
        
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
