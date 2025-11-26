@extends('master')
@section('title', 'Employee Login')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Employee Login</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee.login.post') }}" method="POST" class="max-w-md mx-auto">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-sm text-gray-600">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" class="w-full p-2 border rounded"
                required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm text-gray-600">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded">Login</button>
            <a href="{{ route('employee.register') }}" class="text-sm text-gray-600 self-center">Create account</a>
        </div>
    </form>
@endsection