<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-50 to-slate-100 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white/90 backdrop-blur border border-slate-200 rounded-2xl shadow-lg p-6 sm:p-8">

                {{-- Header --}}
                <div class="mb-6 text-center">
                    <h1 class="text-2xl font-semibold text-slate-900">
                        Masuk ke SkillBridge
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Lanjutkan perjalanan belajarmu 🚀
                    </p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            class="mt-1 block w-full rounded-xl"
                            :value="old('email')"
                            required
                            autofocus
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            class="mt-1 block w-full rounded-xl"
                            required
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    {{-- Remember --}}
                    <div class="flex items-center justify-between text-sm">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox"
                                   name="remember"
                                   class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="text-slate-600">Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-indigo-600 hover:underline text-xs">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    {{-- Button --}}
                    <button
                        type="submit"
                        class="w-full mt-4 inline-flex justify-center items-center px-4 py-2.5 rounded-xl
                               bg-indigo-600 text-white text-sm font-medium
                               hover:bg-indigo-700 transition">
                        Masuk
                    </button>
                </form>

                {{-- Footer --}}
                <p class="text-center text-xs text-slate-500 mt-6">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
