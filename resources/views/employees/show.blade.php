@extends('master')
@section('title', 'Detail Pegawai')
@section('content')
    <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3">Detail Pegawai</h1>
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Nama Lengkap</th>
                    <td class="px-6 py-4">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Email</th>
                    <td class="px-6 py-4">{{ $employee->email }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Nomor Telepon</th>
                    <td class="px-6 py-4">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Tanggal Lahir</th>
                    <td class="px-6 py-4">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Alamat</th>
                    <td class="px-6 py-4">{{ $employee->alamat }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Tanggal Masuk</th>
                    <td class="px-6 py-4">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Status</th>
                    <td class="px-6 py-4">{{ $employee->status }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Departemen</th>
                    <td class="px-6 py-4">{{ $employee->department?->nama_departemen ?? '-' }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Jabatan</th>
                    <td class="px-6 py-4">{{ $employee->position?->nama_jabatan ?? '-' }}</td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Gaji Pokok</th>
                    <td class="px-6 py-4">{{ $employee->position?->gaji_pokok ?? 0 }}</td>
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