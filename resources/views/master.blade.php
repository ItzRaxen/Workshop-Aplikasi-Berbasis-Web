<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Ikon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMD/CDQzFEf-x5QpE+q8w2Qn2P1U0R9F2g6v0rW2t1/9485C/99/3R5/84478f7eQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#1d4ed8', // Biru gelap untuk brand
                        'secondary': '#f9fafb', // Abu-abu muda untuk background
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-secondary min-h-screen">
    
    <!-- Navigation Samping (Sidebar) -->
    <aside class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg p-4 hidden md:block z-10">
        <div class="text-primary text-2xl font-extrabold mb-8 border-b pb-4">
            <i class="fas fa-users-cog mr-2"></i> App Pegawai
        </div>
        <nav>
            <ul>
                {{-- Employee --}}
                <li class="mb-2">
                    <a href="{{ url('employees') }}" class="flex items-center p-3 rounded-lg text-gray-700 transition duration-150 
                       {{ Request::is('employees*') ? 'bg-blue-100 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-user-tie w-6"></i>
                        <span class="ml-3">Employee</span>
                    </a>
                </li>
                {{-- Department --}}
                <li class="mb-2">
                    <a href="{{ url('department') }}" class="flex items-center p-3 rounded-lg text-gray-700 transition duration-150 
                       {{ Request::is('department*') ? 'bg-blue-100 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-building w-6"></i>
                        <span class="ml-3">Department</span>
                    </a>
                </li>
                {{-- Attendance --}}
                <li class="mb-2">
                    <a href="{{ url('attendance') }}" class="flex items-center p-3 rounded-lg text-gray-700 transition duration-150 
                       {{ Request::is('attendance*') ? 'bg-blue-100 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-clock w-6"></i>
                        <span class="ml-3">Attendance</span>
                    </a>
                </li>
                {{-- Report --}}
                <li class="mb-2">
                    <a href="{{ url('report') }}" class="flex items-center p-3 rounded-lg text-gray-700 transition duration-150 
                       {{ Request::is('report*') ? 'bg-blue-100 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-file-alt w-6"></i>
                        <span class="ml-3">Report</span>
                    </a>
                </li>
                {{-- Settings --}}
                <li class="mb-2">
                    <a href="{{ url('settings') }}" class="flex items-center p-3 rounded-lg text-gray-700 transition duration-150 
                       {{ Request::is('settings*') ? 'bg-blue-100 text-primary font-semibold' : 'hover:bg-gray-100' }}">
                        <i class="fas fa-cogs w-6"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <div class="md:ml-64 p-4">
        
        <!-- Header Mobile -->
        <header class="md:hidden bg-white shadow-md p-4 flex justify-between items-center mb-4">
            <div class="text-primary text-xl font-extrabold">App Pegawai</div>
            <button class="text-gray-600 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Area Konten yang Di-yield -->
        <main class="p-4 bg-white rounded-lg shadow-xl">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="md:ml-64 p-4 text-center text-gray-500 text-sm">
        &copy;{{ date('Y') }} App Pegawai. All rights reserved.
    </footer>

</body>
</html>
