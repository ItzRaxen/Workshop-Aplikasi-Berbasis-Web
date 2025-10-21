@extends('layouts.master')
@section('title', 'Tambah Data Gaji')

@section('content')
<div class="max-w-2xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <h1 class="mb-6 text-2xl font-bold text-black">Form Tambah Data Gaji</h1>
    <form action="{{ route('salaries.store') }}" method="POST">
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
            <label for="pay_date" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
            <input type="date" name="pay_date" id="pay_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('pay_date', date('Y-m-d')) }}" required>
        </div>
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
            <div>
                <label for="amount" class="block mb-2 text-sm font-medium text-gray-700">Gaji Pokok (Rp)</label>
                <input type="number" name="amount" id="amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('amount', 0) }}" required>
            </div>
            <div>
                <label for="bonus" class="block mb-2 text-sm font-medium text-gray-700">Bonus (Rp)</label>
                <input type="number" name="bonus" id="bonus" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('bonus', 0) }}">
            </div>
            <div>
                <label for="deductions" class="block mb-2 text-sm font-medium text-gray-700">Potongan (Rp)</label>
                <input type="number" name="deductions" id="deductions" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" value="{{ old('deductions', 0) }}">
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('salaries.index') }}" class="px-6 py-2 font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-6 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-pink-700">Simpan</button>
        </div>
    </form>
</div>
@endsection

