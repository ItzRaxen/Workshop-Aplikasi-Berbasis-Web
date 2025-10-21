@extends('layouts.master')
@section('title', 'Manajemen Absensi')

@section('content')
<div class="p-8 mx-auto my-6 bg-white rounded-xl shadow-2xl transition duration-300">
    
    {{-- HEADER DAN TOMBOL AKSI --}}
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Daftar Absensi</h1>
        {{-- Tombol aksi menggunakan warna Indigo konsisten --}}
        <a href="{{ route('attendances.create') }}" 
           class="px-6 py-2.5 font-semibold text-white bg-indigo-600 rounded-lg shadow-md transition duration-300 ease-in-out hover:bg-indigo-700 hover:shadow-lg transform hover:-translate-y-0.5">
            + Catat Absensi
        </a>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-sm font-medium text-green-800 bg-green-100 border-l-4 border-green-500 rounded-md" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    
    {{-- TABEL DATA --}}
    <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            {{-- Header Tabel menggunakan Indigo konsisten --}}
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Nama Karyawan</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Jam Masuk</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Jam Pulang</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-left uppercase">Status</th>
                    <th class="px-6 py-3 text-xs font-bold tracking-wider text-center uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse ($attendances as $attendance)
                    {{-- Hover effect lebih subtle dan profesional --}}
                    <tr class="hover:bg-indigo-50/50 transition duration-150 ease-in-out">
                        {{-- Data Karyawan --}}
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
                        
                        {{-- Data Absensi --}}
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $attendance->check_in_time }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $attendance->check_out_time ?? '-' }}</td>
                        
                        {{-- Status Badge (tetap mempertahankan warna informatif) --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($attendance->status == 'Hadir')
                                <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Hadir</span>
                            @elseif($attendance->status == 'Sakit')
                                <span class="px-3 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">Sakit</span>
                            @elseif($attendance->status == 'Izin')
                                <span class="px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Izin</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">{{ $attendance->status }}</span>
                            @endif
                        </td>
                        
                        {{-- Aksi --}}
                        <td class="flex items-center justify-center px-6 py-4 space-x-3 text-sm font-medium whitespace-nowrap">
                            {{-- Tombol Edit menggunakan warna Indigo --}}
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-150 ease-in-out">
                                Edit
                            </a>
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data absensi ini?');">
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
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-lg italic bg-gray-50">
                            Belum ada data absensi yang tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $attendances->links() }}
    </div>
</div>
@endsection