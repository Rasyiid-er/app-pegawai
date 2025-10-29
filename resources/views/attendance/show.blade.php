@extends('master')
@section('title', 'Detail Absensi')
@section('content')
    <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3">Detail Absensi</h1>
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">ID Karyawan</th>
                    <td class="px-6 py-4">{{ $attendance->karyawan_id }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Tanggal</th>
                    <td class="px-6 py-4">{{ $attendance->tanggal }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Waktu Masuk</th>
                    <td class="px-6 py-4">{{ $attendance->waktu_masuk }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Waktu Keluar</th>
                    <td class="px-6 py-4">{{ $attendance->waktu_keluar }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Status Absensi</th>
                    <td class="px-6 py-4">{{ $attendance->status_absensi }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <button class="rounded-full bg-gray-400 px-4 py-2 text-white" type="button"
            onclick="window.history.back();">Kembali</button>
    </div>
@endsection