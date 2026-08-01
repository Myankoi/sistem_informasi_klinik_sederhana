<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIKS')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 text-sm">

    @auth
        <div class="w-full max-w-xs mb-4 pb-2 border-b flex justify-between items-center">
            <span>
                User: {{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="underline">Logout</button>
            </form>
        </div>
    @endauth

    <main class="w-full max-w-xs">
        @yield('content')
    </main>

</body>
</html>
