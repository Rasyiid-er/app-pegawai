<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">
    <header class="bg-blue-600 text-white p-4 shadow-md">
        <div class="flex items-center justify-between mb-3">
            <h1 class="text-2xl font-bold">@yield('page-title', 'App Pegawai')</h1>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-sm">{{ Auth::user()->name ?? Auth::user()->email }}</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                            Logout
                        </button>
                    </form>
                @endauth
                <a href="/" class="bg-white text-blue-600 hover:bg-gray-100 px-4 py-2 rounded text-sm">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        @auth
            <nav>
                <ul class="flex gap-6 flex-wrap">
                    <li><a href="{{ url('/employees') }}" class="hover:underline">Employees</a></li>
                    <li><a href="{{ url('/departments') }}" class="hover:underline">Department</a></li>
                    <li><a href="{{ url('/attendance') }}" class="hover:underline">Attendance</a></li>
                    <li><a href="{{ url('/positions') }}" class="hover:underline">Position</a></li>
                    <li><a href="{{ url('/salaries') }}" class="hover:underline">Salary</a></li>
                </ul>
            </nav>
        @endauth
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