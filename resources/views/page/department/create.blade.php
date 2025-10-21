@extends('layouts.master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="max-w-2xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <h1 class="mb-6 text-2xl font-bold text-black">Form Tambah Departemen</h1>
    
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        {{-- Input untuk Nama Departemen --}}
        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama Departemen</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('name') }}" required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input untuk Deskripsi --}}
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">{{ old('description') }}</textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('departments.index') }}" class="px-6 py-2 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-6 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-pink-700">Simpan</button>
        </div>
    </form>
</div>
@error('nama_departemen')
    <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
@enderror

@error('description')
    <p class="mt-1 text-xs font-medium text-red-500">{{ $message }}</p>
@enderror
@endsection
