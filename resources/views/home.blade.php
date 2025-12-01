@extends('layouts.app')


@section('title', 'Home - Welcome')

@section('content')
<div x-data="{
    currentSlide: 0,
    features: [
        { icon: '🚀', title: 'Fast Performance', desc: 'Lightning-fast load times' },
        { icon: '🔒', title: 'Secure', desc: 'Enterprise-level security' },
        { icon: '💎', title: 'Premium Quality', desc: 'Top-tier experience' },
        { icon: '🌐', title: 'Global Reach', desc: 'Worldwide availability' },
        { icon: '⚡', title: 'Instant Deploy', desc: 'Deploy in seconds' },
        { icon: '📱', title: 'Mobile Ready', desc: 'Fully responsive design' }
    ],
    startCarousel() {
        setInterval(() => {
            this.currentSlide = (this.currentSlide + 1) % this.features.length;
        }, 3000);
    }
}"
x-init="startCarousel()"
class="min-h-screen">

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-up">
                    Build Your Dreams with
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-pink-200">
                        Modern Technology
                    </span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-100 max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                    Empowering developers and businesses with cutting-edge solutions for tomorrow's challenges
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up animation-delay-400">
                    <a href="#" class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                        Get Started Free
                    </a>
                    <a href="#" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">
                        Explore Bootcamp
                    </a>
                </div>
            </div>

            {{-- Hero Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16 text-center">
                <div class="animate-fade-in-up animation-delay-600">
                    <div class="text-4xl font-bold">10K+</div>
                    <div class="text-gray-200 mt-2">Active Users</div>
                </div>
                <div class="animate-fade-in-up animation-delay-700">
                    <div class="text-4xl font-bold">500+</div>
                    <div class="text-gray-200 mt-2">Projects</div>
                </div>
                <div class="animate-fade-in-up animation-delay-800">
                    <div class="text-4xl font-bold">99.9%</div>
                    <div class="text-gray-200 mt-2">Uptime</div>
                </div>
                <div class="animate-fade-in-up animation-delay-900">
                    <div class="text-4xl font-bold">24/7</div>
                    <div class="text-gray-200 mt-2">Support</div>
                </div>
            </div>
        </div>

        {{-- Wave SVG --}}
        <div class="absolute bottom-0 left-0 w-full">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    {{-- Features Carousel --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
                <p class="text-xl text-gray-600">Discover what makes us different</p>
            </div>

            {{-- Carousel --}}
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-500 ease-in-out"
                     :style="transform: translateX(-${currentSlide * (100 / 3)}%)">
                    <template x-for="(feature, index) in features" :key="index">
                        <div class="w-full md:w-1/3 flex-shrink-0 px-4">
                            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 h-full">
                                <div class="text-6xl mb-4" x-text="feature.icon"></div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3" x-text="feature.title"></h3>
                                <p class="text-gray-600" x-text="feature.desc"></p>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Carousel Indicators --}}
                <div class="flex justify-center gap-2 mt-8">
                    <template x-for="(feature, index) in features" :key="index">
                        <button @click="currentSlide = index"
                                :class="currentSlide === index ? 'bg-indigo-600 w-8' : 'bg-gray-300 w-3'"
                                class="h-3 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600">Everything you need to succeed</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Service Card 1 --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Web Development</h3>
                    <p class="text-gray-600 mb-4">Build scalable and modern web applications with cutting-edge technologies</p>
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                {{-- Service Card 2 --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Mobile Apps</h3>
                    <p class="text-gray-600 mb-4">Create stunning mobile experiences for iOS and Android platforms</p>
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                {{-- Service Card 3 --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Data Analytics</h3>
                    <p class="text-gray-600 mb-4">Transform your data into actionable insights with advanced analytics</p>
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-800 inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="text-xl mb-8 text-gray-100 max-w-2xl mx-auto">Join thousands of satisfied users and transform your business today</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl">
                    Start Free Trial
                </a>
                <a href="#" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">
                    Sign In
                </a>
            </div>
        </div>
    </section>

</div>

@push('styles')
<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(20px, -50px) scale(1.1); }
        50% { transform: translate(-20px, 20px) scale(0.9); }
        75% { transform: translate(20px, 50px) scale(1.05); }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
        animation-fill-mode: backwards;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
        animation-fill-mode: backwards;
    }

    .animation-delay-600 {
        animation-delay: 0.6s;
        animation-fill-mode: backwards;
    }

    .animation-delay-700 {
        animation-delay: 0.7s;
        animation-fill-mode: backwards;
    }

    .animation-delay-800 {
        animation-delay: 0.8s;
        animation-fill-mode: backwards;
    }

    .animation-delay-900 {
        animation-delay: 0.9s;
        animation-fill-mode: backwards;
    }
</style>
@endpush
@endsection