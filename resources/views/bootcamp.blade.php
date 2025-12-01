@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    <section class="bg-indigo-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Transform Your Career with Our Bootcamp Programs</h1>
                <p class="text-xl mb-8">Learn in-demand skills from industry experts and launch your tech career</p>
                <button class="bg-white text-indigo-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100">
                    Explore Programs
                </button>
            </div>
        </div>
    </section>

    <!-- Programs Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Bootcamp Programs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Program Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('img/web.jpeg') }}" alt="Web Development" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                        <p class="text-gray-600 mb-4">Learn full-stack web development with modern technologies.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-indigo-600 font-semibold">12 weeks</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Program Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('img/data.jpeg') }}" alt="Data Science" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Data Science</h3>
                        <p class="text-gray-600 mb-4">Master data analysis, machine learning, and AI fundamentals.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-indigo-600 font-semibold">16 weeks</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Learn More</button>
                        </div>
                    </div>
                </div>

                <!-- Program Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('img/uiux.jpeg') }}" alt="UX/UI Design" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">UX/UI Design</h3>
                        <p class="text-gray-600 mb-4">Create beautiful and functional user interfaces.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-indigo-600 font-semibold">10 weeks</span>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Start Your Journey?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Join thousands of students who have transformed their careers through our bootcamp programs.</p>
            <button class="bg-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-indigo-700">
                Apply Now
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">TechBootcamp</h3>
                    <p class="text-gray-400">Transforming careers through technology education.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Programs</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Web Development</a></li>
                        <li><a href="#" class="hover:text-white">Data Science</a></li>
                        <li><a href
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>info@techbootcamp.com</li>
                        <li>1-800-TECH-BOOT</li>
                        <li>123 Tech Street, City</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 TechBootcamp. All rights reserved.</p>
            </div>
        </div>
    </footer>
</section>
@endsection
