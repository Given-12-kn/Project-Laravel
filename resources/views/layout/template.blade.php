<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
  <div class="relative bg-gradient-to-r from-gradientStart via-gradientMid to-gradientEnd h-screen overflow-hidden">
    <!-- Navbar -->
    <nav class="absolute top-0 w-full bg-gradient-to-r from-gradientStart via-gradientMid to-gradientEnd bg-opacity-80 backdrop-blur-md py-4 z-50">
        <div class="container mx-auto flex justify-center items-center px-4">
            <a href="/" class="text-2xl font-bold text-black mr-8">anjay</a>
            <div class="flex space-x-8">
                <a href="#about" class="px-6 py-4 text-white hover:text-blue-500 transition duration-300">About</a>
                <a href="#services" class="px-6 py-4 text-white hover:text-blue-500 transition duration-300">Services</a>
                <a href="#contact" class="px-6 py-4 text-white hover:text-blue-500 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Floating Flowers Animation -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-20 left-10 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-flowerPink hexagon"></div>
        <div class="absolute top-20 left-1/4 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-flowerYellow hexagon"></div>
        <div class="absolute transform -translate-x-1/2 w-16 h-16 bg-flowerBlue hexagon top-1/2 left-1/3"></div>
        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-flowerPurple hexagon top-5 left-3/4"></div>
        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-flowerPink hexagon top-7 left-1/2"></div>
        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-flowerYellow hexagon top-5 left-20"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 flex items-center justify-center h-full">
        <h1 class="text-5xl font-bold text-white drop-shadow-lg">
            Welcome to the Amazing UI
        </h1>
    </div>
  </div>

  @yield('content')

  @vite('resources/js/app.js')
</body>
</html>
