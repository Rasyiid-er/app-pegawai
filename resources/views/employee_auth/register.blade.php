@extends('master')
@section('title', 'Registrasi Akun Pegawai')
@section('page-title', 'Registrasi Akun Pegawai')
@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-blue-50 border border-blue-200 text-blue-700 rounded-lg p-4 mb-6">
            <div class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-semibold mb-1">Informasi Penting:</p>
                    <ul class="text-sm list-disc pl-5 space-y-1">
                        <li>Hanya pegawai yang sudah terdaftar di database yang bisa membuat akun</li>
                        <li>Pilih nama Anda dari dropdown, lalu buat username dan password</li>
                        <li>Setelah akun dibuat, Anda bisa langsung absen di halaman utama</li>
                    </ul>
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($employees->isEmpty())
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 rounded-lg p-4 mb-6">
                <p class="font-semibold">Tidak ada pegawai yang tersedia untuk registrasi.</p>
                <p class="text-sm mt-1">Semua pegawai sudah memiliki akun atau belum ada data pegawai.</p>
            </div>
            <a href="/" class="inline-block bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded">
                Kembali ke Beranda
            </a>
        @else
            <form action="{{ route('employee.register.post') }}" method="POST" class="bg-white shadow-lg rounded-lg p-6">
                @csrf

                <div class="relative mb-6">
                    <select name="employee_id" id="employee_id"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        required>
                        <option value="">-- Pilih Nama Pegawai --</option>
                        @foreach($employees as $e)
                            <option value="{{ $e->id }}" {{ old('employee_id') == $e->id ? 'selected' : '' }}>
                                {{ $e->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    <label for="employee_id"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Nama Pegawai
                    </label>
                </div>

                <div class="relative mb-6">
                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="username"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Username
                    </label>
                </div>

                <div class="relative mb-6">
                    <input type="password" name="password" id="password"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="password"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Password (minimal 6 karakter)
                    </label>
                </div>

                <div class="relative mb-6">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="password_confirmation"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-left bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4">
                        Konfirmasi Password
                    </label>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="flex-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-3 text-center">
                        Buat Akun
                    </button>
                    <a href="/"
                        class="flex-1 text-center text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-semibold rounded-lg text-sm px-5 py-3">
                        Batal
                    </a>
                </div>
            </form>
        @endif
    </div>
@endsection