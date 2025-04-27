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
            }
            .auth-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
                position: relative;
            }
            
            .auth-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at 10% 20%, rgba(90, 92, 243, 0.1) 0%, rgba(249, 203, 237, 0.1) 90%);
                z-index: -1;
            }
            
            .auth-header {
                padding: 1.5rem;
                background: linear-gradient(to right, #4776E6, #8E54E9);
                color: white;
                border-radius: 0.5rem 0.5rem 0 0;
                width: 100%;
                text-align: center;
                box-shadow: 0 4px 15px rgba(71, 118, 230, 0.3);
            }
            
            .auth-card {
                width: 100%;
                max-width: 500px;
                border-radius: 16px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
                background-color: rgba(22, 28, 45, 0.85);
                margin-bottom: 2rem;
                border: none;
                backdrop-filter: blur(10px);
                overflow: hidden;
                transform: perspective(1000px) rotateX(0deg);
                transition: all 0.5s ease;
            }
            
            .auth-card:hover {
                transform: perspective(1000px) rotateX(2deg);
                box-shadow: 0 25px 50px rgba(71, 118, 230, 0.5);
            }
            
            .auth-body {
                padding: 2.5rem;
                background-color: rgba(30, 41, 59, 0.8);
                color: #f1f1f1;
                border-radius: 0 0 16px 16px;
            }
            
            .form-control {
                background-color: rgba(17, 24, 39, 0.8);
                border: 1px solid #4f46e5;
                color: #f1f1f1;
                border-radius: 8px;
                padding: 0.75rem 1rem;
                transition: all 0.3s ease;
            }
            
            .form-control:focus {
                background-color: rgba(30, 41, 59, 0.9);
                color: #f1f1f1;
                border-color: #8b5cf6;
                box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.25);
            }
            
            .btn-primary {
                background: linear-gradient(to right, #00C9FF, #92FE9D);
                border: none;
                color: #0f172a;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(0, 201, 255, 0.4);
                transition: all 0.3s ease;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
            }
            
            .btn-primary:hover {
                background: linear-gradient(to right, #00d2ff, #9dffaa);
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(0, 201, 255, 0.5);
                color: #0f172a;
            }
            
            .btn-outline-primary {
                border: 2px solid #00C9FF;
                color: #00C9FF;
                font-weight: 600;
                background: transparent;
                box-shadow: 0 4px 15px rgba(0, 201, 255, 0.2);
                transition: all 0.3s ease;
                padding: 0.6rem 1.5rem;
                border-radius: 8px;
            }
            
            .btn-outline-primary:hover {
                background: linear-gradient(to right, #00C9FF, #92FE9D);
                border-color: transparent;
                color: #0f172a;
                transform: translateY(-2px);
                box-shadow: 0 6px 18px rgba(0, 201, 255, 0.4);
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
                padding: 1.2rem 1.5rem;
            }
            
            label {
                color: #e2e8f0;
                font-weight: 500;
                margin-bottom: 0.5rem;
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
        </style>
    </head>
    <body>
        <div class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <h3 class="mb-0">{{ Route::currentRouteName() == 'login' ? 'Login to Your Account' : 'Create an Account' }}</h3>
                </div>
                <div class="auth-body">
                    {{ $slot }}
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">
                    <i class="fas fa-home me-2"></i> Back to Home
                </a>
            </div>
            
            <div class="position-fixed bottom-0 end-0 p-3">
                <div class="d-flex gap-2">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(to right, #FC466B, #3F5EFB); opacity: 0.6; filter: blur(10px);"></div>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(to right, #00C9FF, #92FE9D); opacity: 0.6; filter: blur(8px);"></div>
                </div>
            </div>
            
            <div class="position-fixed top-0 start-0 p-3">
                <div class="d-flex gap-2">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(to right, #4776E6, #8E54E9); opacity: 0.7; filter: blur(15px);"></div>
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(to right, #FC466B, #3F5EFB); opacity: 0.5; filter: blur(15px);"></div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
