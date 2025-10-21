@extends('layouts.master')
@section('title', 'Manajemen Gaji')

@section('content')
<div class="p-8 mx-auto my-6 bg-white rounded-xl shadow-2xl transition duration-300">
    
    {{-- HEADER DAN TOMBOL AKSI --}}
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Riwayat Gaji Karyawan</h1>
        {{-- Tombol aksi menggunakan warna Indigo konsisten --}}
        <a href="{{ route('salaries.create') }}" 
           class="px-6 py-2.5 font-semibold text-white bg-indigo-600 rounded-lg shadow-md transition duration-300 ease-in-out hover:bg-indigo-700 hover:shadow-lg transform hover:-translate-y-0.5">
            + Tambah Data Gaji
        </a>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-sm font-medium text-green-800 bg-green-100 border-l-4 border-green-500 rounded-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    
    {{-- TABEL DATA --}}
    {{-- Mengatur lebar kolom agar angka tidak terpotong --}}
    <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            {{-- Header Tabel menggunakan Indigo konsisten --}}
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Nama Karyawan</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Tanggal Gaji</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-right uppercase">Gaji Pokok</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-right uppercase">Bonus</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-right uppercase">Potongan</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-right uppercase">Total Diterima</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-center uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($salaries as $salary)
                    @php
                        // Menghitung Total Gaji
                        $total = ($salary->amount + $salary->bonus) - $salary->deductions;
                    @endphp
                    {{-- Hover effect subtle --}}
                    <tr class="hover:bg-indigo-50/50 transition duration-150 ease-in-out">
                        {{-- Nama Karyawan --}}
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                        
                        {{-- Tanggal --}}
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($salary->pay_date)->format('d M Y') }}</td>
                        
                        {{-- Gaji Pokok (Rata Kanan) --}}
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800 whitespace-nowrap text-right">Rp {{ number_format($salary->amount, 0, ',', '.') }}</td>
                        
                        {{-- Bonus (Rata Kanan) --}}
                        <td class="px-6 py-4 text-sm text-green-600 whitespace-nowrap text-right">+Rp {{ number_format($salary->bonus, 0, ',', '.') }}</td>
                        
                        {{-- Potongan (Rata Kanan) --}}
                        <td class="px-6 py-4 text-sm text-red-600 whitespace-nowrap text-right">-Rp {{ number_format($salary->deductions, 0, ',', '.') }}</td>
                        
                        {{-- Total Diterima (Bold Rata Kanan) --}}
                        <td class="px-6 py-4 font-extrabold text-sm text-indigo-700 whitespace-nowrap text-right">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        
                        {{-- Aksi --}}
                        <td class="flex items-center justify-center px-6 py-4 space-x-3 text-sm font-medium whitespace-nowrap">
                            <a href="{{ route('salaries.edit', $salary->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-150 ease-in-out">
                                Edit
                            </a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition duration-150 ease-in-out">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-lg italic bg-gray-50">
                            Belum ada data gaji yang tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $salaries->links() }}
    </div>
</div>
@endsection