<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMK Negeri 1 Pasuruan</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/feather-icons"></script>
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<<<<<<< Updated upstream
<<<<<<< Updated upstream

=======
=======
>>>>>>> Stashed changes
    
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

  

=======
  
>>>>>>> Stashed changes
    @include('partials.navbar')
    <!-- Main Content -->
     <main class="flex-grow bg-gray-100">
        @yield('content')
    </main>
<<<<<<< Updated upstream

=======
    
    @include('partials.footer')
    <!-- Footer -->
  
>>>>>>> Stashed changes


    
    @include('partials.footer')
    <!-- Footer -->
  


    <a href="https://wa.me/6288228513539" target="_blank"
        class="fixed z-50 bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg p-4 flex items-center justify-center transition-colors duration-200 group"
        aria-label="Chat via WhatsApp">
         <span class="absolute bottom-16 right-0 mb-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 translate-y-2 transition-all duration-200 bg-gray-900 text-white text-xs rounded px-3 py-1 shadow-lg pointer-events-none">
              Chat admin
         </span>
         <img src="{{ asset('images/icons/wa.png') }}" alt="WhatsApp" class="w-7 h-7 animate-bounce-slow group-hover:animate-bounce-fast" />
    </a>
    <style>
         @keyframes bounce-slow {
              0%, 100% { transform: translateY(0);}
              50% { transform: translateY(-8px);}
         }
         @keyframes bounce-fast {
              0%, 100% { transform: translateY(0);}
              50% { transform: translateY(-16px);}
         }
         .animate-bounce-slow {
              animation: bounce-slow 2s infinite;
         }
         .group:hover .animate-bounce-slow {
              animation: none;
         }
         .group:hover .animate-bounce-fast {
              animation: bounce-fast 0.6s infinite;
         }
    </style>
    @include('partials.footer')
    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();

        // Mobile menu toggle
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
