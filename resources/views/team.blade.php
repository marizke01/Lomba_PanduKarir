@extends('layouts.app')


@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Team</h2>
            <p class="text-lg text-gray-600">Meet the amazing people behind our success website</p>
        </div>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{asset('img/anisa.jpeg')}}" alt="Anisa" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Anisa</h3>
                    <p class="text-gray-600 mb-4">CEO & Founder</p>
                    <p class="text-gray-500 text-sm mb-4">NIM : 2310120019.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-700"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{asset('img/akifah.jpeg')}}" alt="Andi Nur Akifah" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Andi Nur Akifah</h3>
                    <p class="text-gray-600 mb-4">CTO</p>
                    <p class="text-gray-500 text-sm mb-4">NIM : 2310120003</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-700"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <img src="{{asset('img/anita.jpeg')}}" alt="Anita zakiati" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800">Anita Zakiati</h3>
                    <p class="text-gray-600 mb-4">Lead Developer</p>
                    <p class="text-gray-500 text-sm mb-4">NIM : 2310120020</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-500 hover:text-blue-600"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-blue-400 hover:text-blue-500"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-700"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
