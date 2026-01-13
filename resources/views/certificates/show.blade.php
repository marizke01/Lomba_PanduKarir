<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 py-16">

        <div class="relative w-[1100px] rounded-2xl bg-white shadow-2xl overflow-hidden">

            {{-- ACCENT BAR --}}
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-indigo-600 via-sky-500 to-indigo-600"></div>

            {{-- DECORATIVE BLUR --}}
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-sky-300/30 rounded-full blur-3xl"></div>

            <div class="relative z-10 p-20">

                {{-- HEADER --}}
                <div class="text-center mb-14">
                    <p class="uppercase tracking-[0.35em] text-xs text-slate-500 mb-4">
                        SkillBridge Certification
                    </p>

                    <h1 class="text-6xl font-extrabold text-slate-900">
                        Certificate
                    </h1>

                    <p class="mt-3 text-sm tracking-widest text-slate-500">
                        of Completion
                    </p>
                </div>

                {{-- MAIN --}}
                <div class="text-center space-y-8">

                    <p class="text-sm text-slate-500">
                        This certificate is proudly presented to
                    </p>

                    <h2 class="text-5xl font-bold text-indigo-700">
                        {{ $certificate->user->name }}
                    </h2>

                    <div class="max-w-3xl mx-auto">
                        <p class="text-lg text-slate-700 leading-relaxed">
                            Telah berhasil menyelesaikan
                            <span class="font-semibold text-slate-900">
                                {{ $certificate->project_title }}
                            </span>
                            sebagai bagian dari program pembelajaran dan simulasi
                            project profesional di
                            <span class="font-semibold text-indigo-600">
                                SkillBridge
                            </span>.
                        </p>
                    </div>
                </div>

                {{-- DIVIDER --}}
                <div class="flex justify-center my-16">
                    <div class="h-px w-64 bg-gradient-to-r from-transparent via-slate-400 to-transparent"></div>
                </div>

                {{-- FOOTER --}}
                <div class="flex justify-between items-center">

                    <div>
                        <p class="text-xs uppercase tracking-wide text-slate-500">
                            Issued Date
                        </p>
                        <p class="font-medium text-slate-800">
                            {{ $certificate->issued_at->format('d F Y') }}
                        </p>
                    </div>

                    {{-- BADGE --}}
                    <div class="flex flex-col items-center">
                        <div class="h-16 w-16 rounded-full bg-gradient-to-br from-indigo-600 to-sky-500 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            SB
                        </div>
                        <p class="text-xs mt-3 tracking-wide text-slate-500">
                            SkillBridge Certified
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-xs uppercase tracking-wide text-slate-500">
                            Authorized By
                        </p>
                        <p class="font-medium text-slate-800">
                            SkillBridge Platform
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</x-app-layout>
