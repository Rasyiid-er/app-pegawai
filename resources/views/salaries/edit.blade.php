@extends('master')
@section('title', 'Edit Data Gaji')
@section('content')

    <h2 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3 text-center">Edit Data Gaji</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="max-w-2xl mx-auto">
        @csrf
        @method('PUT')

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="karyawan_id" id="karyawan_id" value="{{ old('karyawan_id', $salary->karyawan_id) }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="karyawan_id"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID
                Karyawan</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="bulan" id="bulan" value="{{ old('bulan', $salary->bulan) }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="bulan"
                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bulan</label>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="gaji_pokok"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Gaji
                    Pokok</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="tunjangan"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Tunjangan</label>
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="potongan" id="potongan" value="{{ old('potongan', $salary->potongan) }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="potongan"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Potongan</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="total_gaji" id="total_gaji" value="{{ old('total_gaji', $salary->total_gaji) }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="total_gaji"
                    class="absolute text-m text-gray-500 duration-300 transform -translate-y-6 scale-75 top-4 -z-10 origin-[0]">Total
                    Gaji</label>
            </div>
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