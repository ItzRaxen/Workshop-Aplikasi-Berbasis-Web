@extends('master')

@section('content')
<div class="p-4">
    
    {{-- Header Judul dan Tombol Tambah --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-users mr-3 text-blue-600"></i> Daftar Pegawai
        </h1>
        <a href="{{ route('employees.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out">
            <i class="fas fa-plus mr-2"></i> Tambah Pegawai
        </a>
    </div>
    
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5 shadow-md" role="alert">
            <span class="block sm:inline font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- KONTEN TABEL DATA --}}
    <div class="bg-white shadow-xl rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-3">Nama Lengkap</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Nomor Telepon</th>
                    <th class="px-6 py-3">Tanggal Lahir</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Jabatan ID</th>
                    <th class="px-6 py-3">Tanggal Masuk</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($employees as $employee)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $employee->nama_lengkap }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->nomor_telepon }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->tanggal_lahir }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->alamat }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-indigo-600">{{ $employee->jabatan_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $employee->tanggal_masuk }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ strtolower($employee->status) == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-1">
                            {{-- TOMBOL AKSI CRUD --}}
                            <a href="{{ route('employees.show', $employee->id) }}" 
                               class="inline-block text-indigo-600 hover:text-indigo-900 font-semibold">Detail</a>
                            <span class="text-gray-400">|</span>
                            <a href="{{ route('employees.edit', $employee->id) }}" 
                               class="inline-block text-blue-600 hover:text-blue-900 font-semibold">Edit</a>
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('employees.destroy', $employee->id) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus {{ $employee->nama_lengkap }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold focus:outline-none">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500 bg-gray-50">
                            Tidak ada data pegawai yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($employees->hasPages())
        <div class="mt-6">
            {{ $employees->links() }}
        </div>
    @endif
</div>
@endsection
