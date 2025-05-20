<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMK Negeri 1 Pasuruan</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    
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
  
 
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
   
    <!-- Footer -->
  

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
        
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    @yield('scripts')
</body>
</html>