@extends('master')
@section('title', 'Edit Jabatan')
@section('content')

    <h2 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3 text-center">Edit Jabatan</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="max-w-2xl mx-auto">
        @csrf
        @method('PUT')

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama_jabatan" id="nama_jabatan"
                value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="nama_jabatan"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                Jabatan</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="gaji_pokok"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gaji
                Pokok</label>
        </div>

        <div class="flex gap-3 mt-6">
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-6 py-2.5"
                type="submit">Update</button>
            <button type="button"
                class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-6 py-2.5"
                onclick="window.history.back();">Kembali</button>
        </div>

    </form>
@endsection