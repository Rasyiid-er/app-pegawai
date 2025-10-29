@extends('master')
@section('title', 'Daftar Gaji')
@section('content')
    <div class="container mt-5">
        <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3">Daftar Gaji</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id Karyawan</th>
                        <th scope="col" class="px-6 py-3">Bulan</th>
                        <th scope="col" class="px-6 py-3">Gaji Pokok</th>
                        <th scope="col" class="px-6 py-3">Tunjangan</th>
                        <th scope="col" class="px-6 py-3">Potongan</th>
                        <th scope="col" class="px-6 py-3">Total Gaji</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $salary)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $salary->karyawan_id }}</th>
                            <td class="px-6 py-4">{{ $salary->bulan }}</td>
                            <td class="px-6 py-4">{{ $salary->gaji_pokok }}</td>
                            <td class="px-6 py-4">{{ $salary->tunjangan }}</td>
                            <td class="px-6 py-4">{{ $salary->potongan }}</td>
                            <td class="px-6 py-4">{{ $salary->total_gaji }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('salaries.show', $salary->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Detail</a> |
                                <a href="{{ route('salaries.edit', $salary->id) }}"
                                    class="font-medium text-yellow-600 hover:underline">Edit</a> |
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex gap-3 mt-4">
            <form action="{{ route('salaries.create') }}" method="GET">
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-6 py-2.5" type="submit">Tambah</button>
            </form>

            <button class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-6 py-2.5" type="button" onclick="window.history.back();">Kembali</button>
        </div>

    </div>
@endsection