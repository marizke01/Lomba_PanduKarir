@extends('layouts.app')


@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">Contact Us</h1>
            <p class="mt-4 text-lg text-gray-600">Have questions? We'd love to hear from you.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Our Office</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Jl.TB Simatupang usiness Street<br>
                            Jakarta, Indonesia 12345
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Contact Info</h3>
                        <div class="mt-2 space-y-2">
                            <p class="text-base text-gray-500">
                                <span class="font-medium">Email:</span> panduKarir@gmail.com
                            </p>
                            <p class="text-base text-gray-500">
                                <span class="font-medium">Phone:</span> +62 123 456 7890
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Business Hours</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Monday - Friday: 9:00 AM - 5:00 PM<br>
                            Saturday - Sunday: Closed
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
