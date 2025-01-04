<div class="relative bg-gradient-to-r from-gradientStart via-gradientMid to-gradientEnd h-screen overflow-hidden">

    <nav class="absolute top-0 w-full bg-gradient-to-r from-gradientStart via-gradientMid to-gradientEnd bg-opacity-80 backdrop-blur-md py-4 z-50">
        <div class="container mx-auto flex justify-center items-center px-4">
            <a href="/" class="text-2xl font-bold text-black mr-8">anjay</a>
            <div class="flex space-x-8">
                <a href="#about" class="nav-link px-8 py-6 text-white hover:text-blue-500 transition duration-300">About</a>
                <a href="#services" class="nav-link px-8 py-6 text-white hover:text-blue-500 transition duration-300">Services</a>
                <a href="#contact" class="nav-link px-8 py-6 text-white hover:text-blue-500 transition duration-300">Contact</a>
            </div>
        </div>
    </nav>

    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="hexagon" style="top: 10%; left: 50%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 25%; left: 75%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 50%; left: 90%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 75%; left: 75%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 90%; left: 50%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 75%; left: 25%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 50%; left: 10%; transform: translate(-50%, -50%);"></div>
        <div class="hexagon" style="top: 25%; left: 25%; transform: translate(-50%, -50%);"></div>
    </div>

    <!-- Content -->

    <div class="relative z-10 flex items-center justify-center h-full flex-col">
        @yield('contentBgForm')
    </div>

    </div>

  </div>