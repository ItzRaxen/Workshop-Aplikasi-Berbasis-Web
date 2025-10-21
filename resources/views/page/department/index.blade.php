@extends('layouts.master')
@section('title', 'Manajemen Departemen')

@section('content')
<div class="p-6 mx-auto mt-6 bg-white rounded-lg shadow-md md:p-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Departemen</h1>
        <a href="{{ route('departments.create') }}" class="px-4 py-2 font-bold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
            + Tambah Baru
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 border-l-4 border-green-500" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue border border-gray-200">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase">Nama Departemen</th>
                    <th class="px-6 py-3 text-xs font-semibold tracking-wider text-left text-white uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-xs font-semibold tracking-wider text-center text-white uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($departments as $department)
                    <tr class="hover:bg-blue-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $department->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $department->description ?? '-' }}</td>
                        <td class="flex items-center justify-center px-6 py-4 space-x-4 text-sm font-medium whitespace-nowrap">
                            <a href="{{ route('departments.edit', $department->id) }}" class="text-amber-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data departemen.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $departments->links() }}
    </div>
</div>
@endsection