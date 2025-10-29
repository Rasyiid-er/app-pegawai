@extends('master')
@section('title', 'Form input Pegawai')
@section('content')
    <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3 text-center">Form Pegawai</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST" class="max-w-2xl mx-auto">
        @csrf

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="nama_lengkap"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                Lengkap</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="email"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="nomor_telepon"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                Telepon</label>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="tanggal_lahir"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Tanggal
                    Lahir</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="tanggal_masuk"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Tanggal
                    Masuk</label>
            </div>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <textarea name="alamat" id="alamat" rows="1"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" ">{{ old('alamat') }}</textarea>
            <label for="alamat"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="status" class="block mb-2 text-sm text-gray-600">Status</label>
                <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <label for="departemen_id" class="block mb-2 text-sm text-gray-600">Departemen</label>
                <select name="departemen_id" id="departemen_id" class="w-full p-2 border border-gray-300 rounded">
                    <option value="">-- Pilih Departemen --</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('departemen_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="jabatan_id" class="block mb-2 text-sm text-gray-600">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="w-full p-2 border border-gray-300 rounded">
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ old('jabatan_id') == $position->id ? 'selected' : '' }}>
                        {{ $position->nama_jabatan }} - {{ $position->gaji_pokok }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3 mt-6">
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-6 py-2.5"
                type="submit">Simpan</button>
            <button type="button"
                class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-6 py-2.5"
                onclick="window.history.back();">Kembali</button>
        </div>
    </form>
@endsection