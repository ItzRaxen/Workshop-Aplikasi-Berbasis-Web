@extends('master')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800 flex items-center">
        <i class="fas fa-user-plus mr-3 text-blue-600"></i> Form Input Pegawai
    </h1>

    <div class="bg-white p-6 rounded-lg shadow-xl border border-gray-200">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="jabatan_id" class="block text-sm font-medium text-gray-700 mb-1">Jabatan:</label>
                    <select id="jabatan_id" name="jabatan_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="1">Manajer (ID: 1)</option>
                        <option value="2">HRD (ID: 2)</option>
                        <option value="3">Keuangan (ID: 3)</option>
                    </select>
                </div>


                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                {{-- Nomor Telepon --}}
                <div>
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon:</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                {{-- Tanggal Lahir --}}
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                {{-- Tanggal Masuk --}}
                <div>
                    <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Masuk:</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                {{-- Status --}}
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status:</label>
                    <select id="status" name="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 appearance-none">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

            </div> {{-- End Grid --}}
            
            {{-- Alamat (Full width) --}}
            <div class="mt-6">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="3" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            
            {{-- Tombol Simpan --}}
            <div class="mt-8 flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i> Simpan Pegawai
                </button>
            </div>
            
        </form>
    </div>
@endsection
