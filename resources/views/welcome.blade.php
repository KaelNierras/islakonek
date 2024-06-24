<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('islaKonek.png') }}" type="image/png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- BladeUI --}}
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased bg-white dark:text-white/50">
    <div class=" bg-gradient-to-r from-blue-50 to-blue-100">
        <div
            class="relative h-screen flex flex-col items-center justify-start selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center items-center lg:col-start-2">
                        <img class="size-12" src="{{ asset('islaKonek.png') }}" alt="IslaKonek" />
                        <h1 class="text-xl font-semibold text-black">IslaKonek</h1>
                    </div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                            @else
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                                        Register
                                    </a>    
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-6">
                    <div class="flex sm:flex-row flex-col justify-evenly ">
                        <div>
                            <div class="flex flex-row items-center">
                                <p class="text-black text-7xl font-poppins">IslaKonek</p>
                                {{-- @include('components.island') --}}
                            </div>
                            <p class="text-black w-80 py-4 text-xl">IslaKonek simplifies contact management for communities on Pangan-an, Gilutongan, and Caohagan, offering a centralized platform for efficient information access.</p>
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}">
                                        <x-bladewind::button class="font-bold">Dashboard</x-bladewind::button>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <x-bladewind::button class="w-36" color="cyan">Log In</x-bladewind::button>
                                    </a>
                                @endauth
                            @endif
                            
                        </div>
                        <div>
                            <img src="{{ asset('island-bg.png') }}" alt="Image" >
                        </div>
                       
                    </div>
                </main>

                {{-- <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer> --}}
            </div>
        </div>
    </div>
</body>

</html>
