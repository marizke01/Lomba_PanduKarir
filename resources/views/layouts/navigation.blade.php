<nav class="bg-white/90 backdrop-blur-md border-b border-gray-200 fixed top-0 left-0 right-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 h-20">

        {{-- LEFT: Logo --}}
        <a href="/" class="flex items-center gap-2 font-extrabold text-xl text-purple-700 tracking-wide">
            <img src="/img/logo.png" class="w-9 h-9">
            SkillBridge
        </a>

        {{-- CENTER: Menu --}}
        <div class="flex gap-8 font-semibold text-gray-700">
            <a href="/" class="hover:text-purple-600 transition">Home</a>
            <a href="#fitur" class="hover:text-purple-600 transition">Fitur</a>
            <a href="#testimoni" class="hover:text-purple-600 transition">Testimoni</a>
            <a href="/cv" class="hover:text-purple-600 transition">CV Builder</a>
        </div>

        {{-- RIGHT: Auth --}}
        <div class="flex items-center gap-4">
            @auth
                <span class="font-semibold text-gray-700">Hi, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-semibold text-sm text-gray-800">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-purple-600 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 rounded-xl text-white font-semibold shadow">
                    Register
                </a>
            @endguest
        </div>

    </div>
</nav>
