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
  @hasSection('no-header')
        {{-- kalo g ada header g ngelakuin apa apa --}}
  @else
      @include('layout.header')
  @endif

  @yield('content')

  @hasSection('no-footer')
    {{-- kalo g ada header g ngelakuin apa apa --}}
  @else
    @include('layout.footer')
  @endif

  @vite('resources/js/app.js')
</body>
</html>
