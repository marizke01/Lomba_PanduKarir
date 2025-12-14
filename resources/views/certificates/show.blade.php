<x-app-layout>
    <div class="py-12 flex justify-center bg-gradient-to-br from-slate-100 to-slate-200 min-h-screen">

        <div class="relative bg-white w-[1000px] p-16 rounded-lg shadow-xl overflow-hidden">

            {{-- DECORATIVE BACKGROUND --}}
            <div class="absolute -top-24 -left-24 w-72 h-72 bg-indigo-200/40 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-sky-200/40 rounded-full blur-3xl"></div>

            {{-- OUTER BORDER --}}
            <div class="absolute inset-4 border-4 border-indigo-600 rounded-lg"></div>

            {{-- INNER BORDER --}}
            <div class="absolute inset-8 border border-indigo-300 rounded-lg"></div>

            {{-- CONTENT --}}
            <div class="relative z-10">

                {{-- HEADER --}}
                <div class="text-center mb-12">
                    <p class="uppercase tracking-[0.3em] text-xs text-slate-500 mb-3">
                        SkillBridge Certification
                    </p>

                    <h1 class="text-5xl font-extrabold text-slate-900 tracking-wide">
                        Certificate
                    </h1>

                    <div class="flex items-center justify-center gap-3 mt-4">
                        <div class="h-px w-20 bg-indigo-400"></div>
                        <span class="text-sm tracking-widest text-slate-600">
                            of Completion
                        </span>
                        <div class="h-px w-20 bg-indigo-400"></div>
                    </div>
                </div>

                {{-- MAIN CONTENT --}}
                <div class="text-center space-y-7">
                    <p class="text-sm text-slate-600">
                        This certificate is proudly presented to
                    </p>

                    <h2 class="text-4xl font-semibold text-indigo-700 tracking-wide">
                        {{ $certificate->user->name }}
                    </h2>

                    <div class="max-w-2xl mx-auto">
                        <p class="text-slate-700 leading-relaxed">
                            Telah berhasil menyelesaikan
                            <span class="font-semibold text-slate-900">
                                {{ $certificate->project_title }}
                            </span>
                            sebagai bagian dari program pembelajaran dan simulasi
                            project profesional di <span class="font-semibold">SkillBridge</span>.
                        </p>
                    </div>
                </div>

                {{-- DIVIDER --}}
                <div class="flex justify-center my-12">
                    <div class="h-[2px] w-40 bg-gradient-to-r from-transparent via-indigo-500 to-transparent"></div>
                </div>

                {{-- FOOTER --}}
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wide">
                            Issued Date
                        </p>
                        <p class="font-medium text-slate-800">
                            {{ $certificate->issued_at->format('d F Y') }}
                        </p>
                    </div>

                    {{-- BADGE --}}
                    <div class="flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">
                            SB
                        </div>
                        <p class="text-xs mt-2 text-slate-600 tracking-wide">
                            SkillBridge Certified
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-xs text-slate-500 uppercase tracking-wide">
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
