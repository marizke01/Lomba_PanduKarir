<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'TechBootcamp')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-sm fixed w-full top-0 left-0 z-50">
    <nav class="container mx-auto px-4 py-6 flex justify-between items-center">
      <div class="text-2xl font-bold text-indigo-600">TechBootcamp</div>
      <div class="hidden md:flex space-x-8">
        <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
        <a href="{{ route('about') }}" class="text-gray-600 hover:text-indigo-600">About Us</a>
        <a href="{{ route('team') }}" class="text-gray-600 hover:text-indigo-600">Our Team</a>
        <a href="{{ route('contact') }}" class="text-gray-600 hover:text-indigo-600">Contact</a>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main class="pt-24">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-gray-100 py-6 mt-10 text-center">
    <p class="text-sm text-gray-500">&copy; {{ date('Y') }} TechBootcamp. All rights reserved.</p>
  </footer>

</body>
</html>
