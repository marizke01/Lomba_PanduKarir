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

            <!-- LEFT: Logo + Links -->
            <div class="flex items-center">

                <!-- Logo -->
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

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8 sm:ms-10">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="text-white hover:text-indigo-100">
                        Dashboard
                    </x-nav-link>
                </div>
            </div>

            <!-- RIGHT: User Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-2
                                   rounded-xl text-sm font-medium
                                   text-white bg-white/10 hover:bg-white/20
                                   focus:outline-none transition">
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

    <!-- Mobile Menu -->
    <div x-show="open" x-transition
         class="sm:hidden bg-gradient-to-r from-indigo-600/90 to-sky-500/90 backdrop-blur-md">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
        </div>

        @auth
        <div class="border-t border-white/20 pt-4 pb-2">
            <div class="px-4 text-white">
                <div class="font-medium">{{ Auth::user()->name }}</div>
                <div class="text-sm opacity-80">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
