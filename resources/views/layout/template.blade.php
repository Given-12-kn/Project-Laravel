<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{--<link rel="stylesheet" href="{{ asset('css/form.css') }}">--}}
    <title>@yield('title')</title>
</head>
<body>
    {{--
    class="bg-black text-white min-h-screen flex items-center justify-center overflow-hidden relative"
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-gray-700 rounded-full bg-flower" style="width: 1000px; height: 1000px; opacity: 0.5;"></div>
      </div>
      <!-- Elemen kecil muncul -->
      <div class="absolute top-1/4 left-1/4 float-element">
        <div class="bg-blue-500 rounded-full w-16 h-16 flex items-center justify-center">
          🌐
        </div>
      </div>

      <div class="absolute bottom-1/3 right-1/3 float-element" style="animation-delay: 0.5s;">
        <div class="bg-green-500 rounded-full w-16 h-16 flex items-center justify-center">
          🪙
        </div>
      </div>

      <div class="absolute bottom-1/4 left-1/3 float-element" style="animation-delay: 1s;">
        <div class="bg-yellow-500 rounded-full w-16 h-16 flex items-center justify-center">
          ⚡
        </div>
      </div> --}}

    @yield('content')
    @vite('resources/js/app.js')
</body>
</html>
