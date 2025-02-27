<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Home'])  
</head>
<body>
<header class="py-4 px-2 bg-gray-800 text-white">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <!-- Logo / Home -->
        <a href="/" class="text-lg font-semibold hover:text-gray-300">Home</a>

        <!-- Meniu de navigație -->
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 text-white border border-transparent hover:border-gray-400 rounded-sm text-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-white border border-transparent hover:border-gray-400 rounded-sm text-sm">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 text-white border border-gray-400 hover:border-gray-500 rounded-sm text-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</header>

    <div class="max-w-7xl mx-auto px-4 py-3">
    <h1 class="mt-2 text-3xl font-medium tracking-tight text-gray-950 dark:text-white">Home Page</h1>
    </div>
</body>
</html>