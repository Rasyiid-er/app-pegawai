@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
    <div class="container mt-5">
        <h1 class="text-3xl font-semibold tracking-tight sm:text-3xl mb-3">Daftar Hadir</h1>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id Karyawan</th>
                        <th scope="col" class="px-6 py-3">Tanggal Absen</th>
                        <th scope="col" class="px-6 py-3">Waktu Masuk</th>
                        <th scope="col" class="px-6 py-3">Waktu Keluar</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendance as $kehadiran)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $kehadiran->karyawan_id }}
                            </th>
                            <td class="px-6 py-4">{{ $kehadiran->tanggal }}</td>
                            <td class="px-6 py-4">{{ $kehadiran->waktu_masuk }}</td>
                            <td class="px-6 py-4">{{ $kehadiran->waktu_keluar }}</td>
                            <td class="px-6 py-4">{{ $kehadiran->status_absensi }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('attendance.show', $kehadiran->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Detail</a> |
                                <a href="{{ route('attendance.edit', $kehadiran->id) }}"
                                    class="font-medium text-yellow-600 hover:underline">Edit</a> |
                                <form action="{{ route('attendance.destroy', $kehadiran->id) }}" method="POST" class="inline">
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
            <form action="{{ route('attendance.create') }}" method="GET">
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-6 py-2.5"
                    type="submit">Absen</button>
            </form>

            <button
                class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm px-6 py-2.5"
                type="button" onclick="window.history.back();">Kembali</button>
        </div>

    </div>
@endsection