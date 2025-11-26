@extends('master')
@section('title', 'My Attendance')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">My Attendance</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">{{ session('error') }}</div>
    @endif

    <div class="mb-6">
        <form action="{{ route('employee.attendance.checkin') }}" method="POST" class="inline">
            @csrf
            <button class="text-white bg-green-600 px-4 py-2 rounded">Check In</button>
        </form>
        <form action="{{ route('employee.attendance.checkout') }}" method="POST" class="inline ml-2">
            @csrf
            <button class="text-white bg-red-600 px-4 py-2 rounded">Check Out</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Masuk</th>
                    <th class="px-4 py-2">Keluar</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $a)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $a->tanggal }}</td>
                        <td class="px-4 py-2">{{ $a->waktu_masuk ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $a->waktu_keluar ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $a->status_absensi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection