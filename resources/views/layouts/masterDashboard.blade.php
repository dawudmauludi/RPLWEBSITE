<!-- masterDashboard.blade.php (Updated) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMK Negeri 1 Pasuruan</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/logo_skensa.png') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5a1b9b',
                        'primary-dark': '#4e1a89',
                        accent: '#00b4d8',
                    }
                }
            }
        };
    </script>

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('styles')
</head>
<body class="font-sans bg-gray-100 min-h-screen">
    @include('partials.navbar')
    @include('partials.sidebar')

    <main class="lg:ml-64 pt-20 p-6 min-h-screen">
        @yield('content')
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
        });
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    @yield('scripts')
</body>
</html>
