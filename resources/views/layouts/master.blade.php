<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMK Negeri 1 Pasuruan</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#5a1b9b',
                        'primary-dark': '#4e1a89',
                        'accent': '#00b4d8',
                    }
                }
            }
        }
    </script>

    @yield('styles')
</head>
<body class="flex flex-col min-h-screen font-sans">
    @include('partials.navbar')
    <!-- Main Content -->
     <main class="flex-grow bg-gray-100">
        @yield('content')
    </main>

    <!-- Footer -->
   @include('partials.footer')

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();

        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        feather.replace();
    });
</script>

    @yield('scripts')
</body>
</html>
