@extends('layouts.master')
@section('title', 'Manajemen Karyawan')

@section('content')
<div class="p-6 mx-auto mt-6 bg-white rounded-lg shadow-xl md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-black">Daftar Karyawan</h1>
        <a href="{{ route('employees.create') }}" class="px-5 py-2 font-bold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-pink-700 transform hover:-translate-y-1">
            + Tambah Karyawan
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 border-l-4 border-green-500" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Nama Lengkap</th>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Email</th>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Departemen</th>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Jabatan</th>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase">Status</th>
                    <th class="px-6 py-3 text-sm font-semibold tracking-wider text-center uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($employees as $employee)
                    <tr class="hover:bg-teal-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->nama_lengkap }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->department->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->position->name ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold {{ $employee->status == 'Aktif' ? 'text-green-800 bg-green-200' : 'text-red-800 bg-red-200' }} rounded-full">{{ $employee->status }}</span>
                        </td>
                        <td class="flex items-center justify-center px-6 py-4 space-x-4 text-sm font-medium whitespace-nowrap">
                            <a href="{{ route('employees.show', $employee->id) }}" class="font-semibold text-green-600 hover:text-green-800">Lihat</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="font-semibold text-amber-600 hover:text-amber-800">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-semibold text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data karyawan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $employees->links() }}
    </div>
</div>
@endsection