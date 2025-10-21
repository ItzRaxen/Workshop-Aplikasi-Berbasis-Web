@extends('layouts.master')
@section('title', 'Detail Karyawan')

@section('content')
<div class="max-w-4xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <div class="flex items-center justify-between mb-6 border-b border-gray-200 pb-4">
        <h1 class="text-3xl font-bold text-black">Detail Karyawan</h1>
        <a href="{{ route('employees.index') }}" class="px-5 py-2 font-medium text-gray-700 transition duration-300 bg-gray-200 rounded-lg hover:bg-gray-300">
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
        {{-- Kolom Kiri --}}
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-500">Nama Lengkap</label>
                <p class="text-lg font-medium text-gray-900">{{ $employee->nama_lengkap }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Email</label>
                <p class="text-lg text-gray-900">{{ $employee->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Nomor Telepon</label>
                <p class="text-lg text-gray-900">{{ $employee->nomor_telepon }}</p>
            </div>
             <div>
                <label class="block text-sm font-semibold text-gray-500">Alamat</label>
                <p class="text-lg text-gray-900">{{ $employee->alamat }}</p>
            </div>
        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-gray-500">Departemen</label>
                <p class="text-lg text-gray-900">{{ $employee->department->name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Jabatan</label>
                <p class="text-lg text-gray-900">{{ $employee->position->name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Tanggal Masuk</label>
                <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-500">Status</label>
                <p class="text-lg">
                    <span class="px-3 py-1 text-sm font-semibold {{ $employee->status == 'Aktif' ? 'text-green-800 bg-green-200' : 'text-red-800 bg-red-200' }} rounded-full">
                        {{ $employee->status }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection