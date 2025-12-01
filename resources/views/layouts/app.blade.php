<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pandu Karier')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom Tailwind config (via CDN setup) --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0b3c66',
                        secondary: '#e5e5e5',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    {{-- Navbar --}}
    <nav class="bg-white shadow-lg" x-data="{ open: false, scrolled: false }"
         @scroll.window="scrolled = window.pageYOffset > 10"
         :class="{ 'shadow-lg': scrolled }">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                {{-- Logo --}}
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="text-2xl font-bold text-primary">Pandu Karier</span>
                    </a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}"
                    class="relative inline-block text-sm font-medium text-gray-700
                            after:content-[''] after:absolute after:left-1/2 after:bottom-[-8px] after:h-[2px]
                            after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                            after:w-0 hover:after:w-full hover:text-primary
                            {{ request()->routeIs('home') ? 'active text-primary [&.active]:after:!w-full' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('bootcamp') }}"
                    class="relative inline-block text-sm font-medium text-gray-700
                            after:content-[''] after:absolute after:left-1/2 after:bottom-[-8px] after:h-[2px] after:w-0
                            after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                            hover:after:w-full
                            {{ request()->routeIs('bootcamp') ? 'active text-primary [&.active]:after:!w-full' : '' }}">
                        Bootcamp
                    </a>
                    <a href="{{ route('about') }}"
                    class="relative inline-block text-sm font-medium text-gray-700
                            after:content-[''] after:absolute after:left-1/2 after:bottom-[-8px] after:h-[2px] after:w-0
                            after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                            hover:after:w-full
                            {{ request()->routeIs('about') ? 'active text-primary [&.active]:after:!w-full' : '' }}">
                        About Us
                    </a>
                    </a>
                    <a href="{{ route('team') }}"
                    class="relative inline-block text-sm font-medium text-gray-700
                            after:content-[''] after:absolute after:left-1/2 after:bottom-[-8px] after:h-[2px] after:w-0
                            after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                            hover:after:w-full
                            {{ request()->routeIs('team') ? 'active text-primary [&.active]:after:!w-full' : '' }}">
                        Our Team
                    </a>
                    <a href="{{ route('contact') }}"
                    class="relative inline-block text-sm font-medium text-gray-700
                            after:content-[''] after:absolute after:left-1/2 after:bottom-[-8px] after:h-[2px] after:w-0
                            after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                            hover:after:w-full
                            {{ request()->routeIs('contact') ? 'active text-primary [&.active]:after:!w-full' : '' }}">
                        Contact
                    </a>
                    <a href="#"
                    class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium hover:border-2 hover:border-primary hover:bg-transparent hover:text-primary transition">
                        Daftar
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <div class="flex items-center md:hidden">
                    <button @click="open = !open"
                            type="button"
                            class="p-2 rounded-md text-gray-700 hover:text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary transition">
                        <span class="sr-only">Buka menu</span>
                        {{-- Hamburger --}}
                        <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        {{-- Close --}}
                        <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open"
             x-transition
             class="md:hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}"
                   class="relative inline-block w-full px-3 py-2 text-base font-medium text-gray-700
                          after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:h-0.5
                          after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                          after:w-0 hover:after:w-[calc(100%-1.5rem)] hover:text-primary
                          {{ request()->routeIs('home') ? 'active text-primary [&.active]:after:w-[calc(100%-1.5rem)]' : '' }}">
                    Home
                </a>
                <a href="{{ route('bootcamp') }}"
                   class="relative inline-block w-full px-3 py-2 text-base font-medium text-gray-700
                          after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:h-0.5
                          after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                          after:w-0 hover:after:w-[calc(100%-1.5rem)] hover:text-primary
                          {{ request()->routeIs('bootcamp') ? 'active text-primary [&.active]:after:w-[calc(100%-1.5rem)]' : '' }}">
                    Bootcamp
                </a>
                <a href="#"
                   class="relative inline-block w-full px-3 py-2 text-base font-medium text-gray-700
                          after:content-[''] after:absolute after:left-1/2 after:bottom-0 after:h-[2px]
                          after:bg-primary after:transition-all after:duration-300 after:-translate-x-1/2
                          after:w-0 hover:after:w-[calc(100%-1.5rem)] hover:text-primary">
                    Masuk
                </a>
                <a href="#"
                   class="block px-3 py-2 rounded-md text-base font-medium bg-primary text-white hover:border-2 hover:border-primary hover:bg-transparent hover:text-primary transition mt-2">
                    Daftar
                </a>
            </div>
        </div>
    </nav>

    {{-- Main --}}
    <main class="max-w-screen mx-auto px-4 py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t mt-12">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            © {{ date('Y') }} Brand. All rights reserved.
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('scripts')
</body>
</html>
