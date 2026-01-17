<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50
           bg-gradient-to-r from-indigo-600/80 via-indigo-500/80 to-sky-500/80
           backdrop-blur-lg
           supports-[backdrop-filter]:bg-white/10
           border-b border-white/20
           shadow-md">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT: BACK + LOGO -->
            <div class="flex items-center gap-2">

                {{-- BACK BUTTON (kecuali dashboard admin) --}}
                @if (!request()->routeIs('admin.dashboard'))
                    <button
                        onclick="window.history.back()"
                        class="inline-flex items-center justify-center
                               h-9 w-9 rounded-xl
                               bg-white/10 hover:bg-white/20
                               text-white transition"
                        title="Kembali">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @endif

                {{-- LOGO --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-2 font-semibold tracking-wide">
                    <span class="inline-flex h-9 w-9 items-center justify-center
                                 rounded-xl bg-white text-indigo-600
                                 text-sm font-bold shadow-sm">
                        SB
                    </span>
                    <span class="text-white text-lg font-semibold">
                        SkillBridge Admin
                    </span>
                </a>
            </div>

            <!-- RIGHT: USER -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <span class="text-white text-sm font-medium bg-white/10 px-4 py-2 rounded-xl">
                    {{ Auth::user()->name }}
                </span>

            </div>
            @endauth

            <!-- MOBILE HAMBURGER -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-md text-white hover:bg-white/20">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open }"
                              stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open }"
                              stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>
</nav>
