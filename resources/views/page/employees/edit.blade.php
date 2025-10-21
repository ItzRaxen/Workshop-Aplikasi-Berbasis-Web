@extends('layouts.master')
@section('title', 'Edit Data Karyawan')

@section('content')
<div class="max-w-4xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <h1 class="mb-6 text-3xl font-bold text-black">Form Edit Karyawan</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" 
                       value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" 
                       value="{{ old('email', $employee->email) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="tel" name="nomor_telepon" id="nomor_telepon" 
                       value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                       value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label for="department_id" class="block mb-2 text-sm font-medium text-gray-700">Departemen</label>
                <select name="department_id" id="department_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    <option value="">-- Pilih Departemen --</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="position_id" class="block mb-2 text-sm font-medium text-gray-700">Jabatan</label>
                <select name="position_id" id="position_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">{{ old('alamat', $employee->alamat) }}</textarea>
            </div>
            <div>
                <label for="tanggal_masuk" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" 
                       value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                    <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end mt-8 space-x-4">
            <a href="{{ route('employees.index') }}" class="px-6 py-2 font-medium text-gray-700 transition duration-300 bg-gray-200 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 font-bold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-pink-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection