@extends('layouts.master')
@section('title', 'Catat Absensi')
@section('content')
<div class="max-w-2xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <div class="card-body">
    <h1 class="mb-6 text-2xl font-bold text-black">Form Catat Absensi</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-700">Karyawan</label>
            <select name="employee_id" id="employee_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>{{ $employee->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('date', date('Y-m-d')) }}" required>
        </div>
        <div class="grid grid-cols-1 gap-6 mb-4 md:grid-cols-2">
            <div>
                <label for="check_in_time" class="block mb-2 text-sm font-medium text-gray-700">Jam Masuk</label>
                <input type="time" name="check_in_time" id="check_in_time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('check_in_time') }}" required>
            </div>
            <div>
                <label for="check_out_time" class="block mb-2 text-sm font-medium text-gray-700">Jam Pulang</label>
                <input type="time" name="check_out_time" id="check_out_time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('check_out_time') }}">
            </div>
        </div>
        <div class="mb-6">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status Kehadiran</label>
            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Izin" {{ old('status') == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option value="Sakit" {{ old('status') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
            </select>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('attendances.index') }}" class="px-6 py-2 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-6 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-pink-700">Simpan</button>
        </div>
    </form>
</div>
@endsection

