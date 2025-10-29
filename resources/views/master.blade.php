<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <h1 class="text-2xl font-bold mb-3">@yield('page-title', 'App Pegawai')</h1>
        <nav>
            <ul class="flex gap-6 flex-wrap">
                <li><a href="{{ url('/employees') }}" class="hover:underline">Employees</a></li>
                <li><a href="{{ url('/departments') }}" class="hover:underline">Department</a></li>
                <li><a href="{{ url('/attendance') }}" class="hover:underline">Attendance</a></li>
                <li><a href="{{ url('/positions') }}" class="hover:underline">Position</a></li>
                <li><a href="{{ url('/salaries') }}" class="hover:underline">Salary</a></li>
                <li><a href="{{ url('/report') }}" class="hover:underline">Report</a></li>
                <li><a href="{{ url('/settings') }}" class="hover:underline">Settings</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-6 flex-1">
        @yield('content')
    </main>

    <footer class="bg-gray-800 w-full text-white text-center p-4">
        <p>&copy; {{ date('Y') }} App Pegawai</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>