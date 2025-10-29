@extends('master')
@section('title', 'Form Absensi')
@section('content')
    <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3 text-center">Form Absensi</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('attendance.store') }}" method="POST" class="max-w-2xl mx-auto">
        @csrf

        <div class="relative z-0 w-full mb-5 group">
            @if(isset($employees) && $employees->count())
                <label for="karyawan_id" class="block mb-2 text-sm text-gray-600">Karyawan</label>
                <select id="karyawan_id" name="karyawan_id" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="">-- Pilih Karyawan --</option>
                    @foreach($employees as $e)
                        <option value="{{ $e->id }}" {{ old('karyawan_id') == $e->id ? 'selected' : '' }}>{{ $e->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            @else
                <input type="text" name="karyawan_id" id="karyawan_id" value="{{ old('karyawan_id') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="karyawan_id"
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID
                    Karyawan</label>
            @endif
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="tanggal"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Tanggal</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ old('waktu_masuk') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="waktu_masuk"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Waktu
                    Masuk</label>
            </div>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ old('waktu_keluar') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="waktu_keluar"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Waktu
                Keluar</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="status_absensi" class="block mb-2 text-sm text-gray-600">Status Absensi</label>
            <select id="status_absensi" name="status_absensi" class="w-full p-2 border border-gray-300 rounded">
                <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="tidak_hadir" {{ old('status_absensi') == 'tidak_hadir' ? 'selected' : '' }}>Tidak Hadir
                </option>
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