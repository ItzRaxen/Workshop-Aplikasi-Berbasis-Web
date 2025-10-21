@extends('layouts.master')
@section('title', 'Tambah Karyawan Baru')

@section('content')

<div class="max-w-4xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
<h1 class="mb-6 text-3xl font-bold text-gray-800">Form Tambah Karyawan</h1>

{{-- Tampilkan pesan sukses jika ada --}}
@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        
        {{-- Nama Lengkap --}}
        <div>
            <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            @error('nama_lengkap')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Nomor Telepon --}}
        <div>
            <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="tel" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            @error('nomor_telepon')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Tanggal Lahir --}}
        <div>
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            @error('tanggal_lahir')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- DEPARTEMEN (Dropdown Diperbaiki) --}}
            <div>
            <label for="department_id" class="block mb-2 text-sm font-semibold text-gray-700">Departemen</label>
            <select name="department_id" id="department_id" 
                {{-- Menerapkan style Indigo yang konsisten dan rapi --}}
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-150 ease-in-out appearance-none bg-white" required>
                
                <option value="">-- Pilih Departemen --</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{-- Gunakan $department->name atau $department->nama sesuai DB --}}
                        {{ $department->name ?? $department->nama }} 
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- JABATAN --}}
        <div>
            <label for="position_id" class="block mb-2 text-sm font-semibold text-gray-700">Jabatan</label>
            <select name="position_id" id="position_id" 
                {{-- Menerapkan style Indigo yang konsisten dan rapi --}}
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-150 ease-in-out appearance-none bg-white" required>
                
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                        {{-- Gunakan $position->name atau $position->nama sesuai DB --}}
                        {{ $position->name ?? $position->nama }}
                    </option>
                @endforeach
            </select>
            @error('position_id')
                <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
            @enderror
        </div>
        {{-- Alamat (Menggunakan 2 kolom penuh) --}}
        <div class="md:col-span-2">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">{{ old('alamat') }}</textarea>
            @error('alamat')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Tanggal Masuk --}}
        <div>
            <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            @error('tanggal_masuk')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Status --}}
        <div>
            <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="flex justify-end mt-8 space-x-4">
        <a href="{{ route('employees.index') }}" class="px-6 py-2 font-medium text-gray-700 transition duration-300 bg-gray-200 rounded-lg hover:bg-gray-300">
            Batal
        </a>
        <button type="submit" class="px-6 py-2 font-bold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
            Simpan
        </button>
    </div>
</form>


</div>
@endsection