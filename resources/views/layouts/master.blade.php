<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplikasi Manajemen Karyawan')</title>
    
    {{-- Menggunakan Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Konfigurasi Tailwind untuk warna dan font yang lebih modern --}}
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                'primary-dark': '#3730a3', 
                'primary-light': '#4f46e5', 
                'secondary-text': '#d1d5db', 
              },
            }
          }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    {{-- NAVIGASI UTAMA (Diperbaiki: Warna, Shadow, Hover Effect) --}}
    <nav class="bg-indigo-700 shadow-xl border-b border-indigo-800">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                {{-- Judul di Kiri --}}
                <div class="text-2xl font-extrabold text-white tracking-wide">
                    <a href="/" class="hover:text-indigo-200 transition duration-150 ease-in-out">Manajemen Staf</a>
                </div>
                
                {{-- Kumpulan Link di Kanan --}}
                <div class="flex space-x-1 sm:space-x-2">
                    @php
                        // Daftar link untuk mempermudah penyesuaian style
                        $navLinks = [
                            ['route' => 'employees.index', 'name' => 'Karyawan'],
                            ['route' => 'departments.index', 'name' => 'Departemen'],
                            ['route' => 'positions.index', 'name' => 'Jabatan'],
                            ['route' => 'attendances.index', 'name' => 'Absensi'],
                            ['route' => 'salaries.index', 'name' => 'Gaji'],
                        ];
                    @endphp

                    @foreach ($navLinks as $link)
                        {{-- Menggunakan bg-indigo-600 untuk hover yang lebih lembut dan kontras --}}
                        <a href="{{ route($link['route']) }}" 
                           class="px-4 py-2 text-sm font-medium text-indigo-100 rounded-lg hover:bg-indigo-600 hover:text-white transition duration-150 ease-in-out">
                           {{ $link['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    {{-- KONTEN UTAMA DARI SETIAP HALAMAN --}}
    <main class="container px-6 py-10 mx-auto">
        @yield('content')
    </main>

    {{-- FOOTER (Diperbaiki: Warna Teks) --}}
    <footer class="py-6 mt-12 border-t border-gray-200 bg-white">
        <div class="container mx-auto text-center">
            <p class="text-sm text-gray-600">&copy; {{ date('Y') }} Perusahaan Anda. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>