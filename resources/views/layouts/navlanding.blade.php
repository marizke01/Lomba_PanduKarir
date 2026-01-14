<nav
    class="sticky top-0 z-50
           bg-gradient-to-r from-indigo-600/70 via-indigo-500/70 to-sky-500/70
           backdrop-blur-lg
           supports-[backdrop-filter]:bg-white/10
           border-b border-white/20
           shadow-md">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            {{-- LEFT: LOGO + DASHBOARD --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('landing') }}"
                   class="flex items-center gap-2 font-semibold tracking-wide">
                    <span
                        class="inline-flex h-9 w-9 items-center justify-center
                               rounded-xl bg-white text-indigo-600
                               text-sm font-bold shadow-sm">
                        SB
                    </span>
                    <span class="text-white text-lg font-semibold">
                        SkillBridge
                    </span>
                </a>

                @auth
                <a href="{{ route('dashboard') }}"
                   class="hidden sm:inline-flex items-center gap-1.5
                          text-sm font-medium text-white/80
                          hover:text-white transition">
                    Dashboard
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <path d="M9 5l7 7-7 7"
                              stroke="currentColor"
                              stroke-width="1.6"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
                @endauth
            </div>

            {{-- RIGHT: AUTH --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-4 py-2 rounded-xl
                              bg-white text-indigo-600 text-sm font-medium
                              hover:bg-indigo-50 transition shadow-sm">
                        Masuk Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-4 py-2 rounded-xl
                              border border-white/40
                              text-white text-sm font-medium
                              hover:bg-white/10 transition">
                        Login
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
