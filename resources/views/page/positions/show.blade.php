@extends('layouts.master')
@section('title', 'Detail Jabatan')

@section('content')
<div class="max-w-2xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-md md:p-8">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Detail Jabatan</h1>
        <a href="{{ route('position.index') }}" class="px-4 py-2 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Kembali</a>
    </div>
    <div class="space-y-4">
        <div>
            <h3 class="font-semibold text-gray-600">Nama Jabatan:</h3>
            <p class="text-lg text-gray-900">{{ $position->name }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-600">Deskripsi:</h3>
            <p class="text-gray-800">{{ $position->description ?? 'Tidak ada deskripsi.' }}</p>
        </div>
    </div>
</div>
@endsection

