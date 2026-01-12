<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50
           bg-gradient-to-r from-indigo-600/80 via-indigo-500/80 to-sky-500/80
           backdrop-blur-lg
           supports-[backdrop-filter]:bg-white/10
           border-b border-white/20
           shadow-md">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT: BACK (conditional) + LOGO -->
            <div class="flex items-center gap-2">

                {{-- BACK BUTTON (HANYA MUNCUL SELAIN DASHBOARD) --}}
                @if (!request()->routeIs('dashboard'))
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
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2 font-semibold tracking-wide">
                    <span class="inline-flex h-9 w-9 items-center justify-center
                                 rounded-xl bg-white text-indigo-600
                                 text-sm font-bold shadow-sm">
                        SB
                    </span>
                    <span class="text-white text-lg font-semibold">
                        SkillBridge
                    </span>
                </a>
            </div>

            <!-- RIGHT: DASHBOARD MENU + USER -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">

                {{-- DASHBOARD MENU DROPDOWN --}}
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-2
                                   rounded-xl text-sm font-medium
                                   text-white bg-white/10 hover:bg-white/20
                                   transition">
                            <span>Fitur</span>
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('skills.index')">
                            Belajar Skill
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('projectlab.index')">
                            Project Lab
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('portfolio.index')">
                            Portofolio
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('certificates.index')">
                            Sertifikat
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('cv.index')">
                            CV Builder
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

               {{-- USER DROPDOWN --}}
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center gap-2 px-3 py-2
                            rounded-xl text-sm font-medium
                            text-white bg-white/10 hover:bg-white/20
                            transition">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        Profile
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link
                            :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>

            </div>
            @endauth

            <!-- Mobile Hamburger -->
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
