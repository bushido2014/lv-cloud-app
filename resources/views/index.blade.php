<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Home'])  
</head>
<body>
 <header class="py-4  bg-gray-800 text-white">
        <div class="container px-4 mx-auto flex justify-between items-center">
            <!-- Logo / Home -->
            <a href="/" class="text-lg font-semibold hover:text-gray-300">Home</a>

            <!-- Meniu nav -->
            <nav class="space-x-4">
                <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
            </nav>
        </div>
    </header>
    <div class="max-w-7xl mx-auto px-4 py-3">
    <h1 class="mt-2 text-3xl font-medium tracking-tight text-gray-950 dark:text-white">Home Page</h1>
    </div>
</body>
</html>