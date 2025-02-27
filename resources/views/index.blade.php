<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => 'Home'])  
</head>
<body>
<header class="py-4 px-2 bg-gray-800">
<div class="container mx-auto text-white flex items-center justify-between">
<div><a href="/" class="inline-block px-5 py-1.5">Home</a></div>
 @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 text-sm leading-normal"
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
</div>
</header>
    <div class="max-w-7xl mx-auto px-4 py-3">
    <h1>Home page</h1>
    </div>
</body>
</html>