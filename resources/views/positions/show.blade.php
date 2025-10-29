@extends('master')
@section('title', 'Detail Jabatan')
@section('content')

    <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3">Detail Jabatan</h1>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">Field</th>
                    <th scope="col" class="px-6 py-3 rounded-e-lg">Value</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">ID</th>
                    <td class="px-6 py-4">{{ $position->id }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Nama Jabatan</th>
                    <td class="px-6 py-4">{{ $position->nama_jabatan }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Gaji Pokok</th>
                    <td class="px-6 py-4">{{ $position->gaji_pokok }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <button
            class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-6 py-2.5"
            type="button" onclick="window.history.back();">Kembali</button>
    </div>
@endsection