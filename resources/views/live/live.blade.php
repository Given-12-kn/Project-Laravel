@extends('layout.template')

@section('title', 'Form Login')

@section('content')
<nav class="bg-blue-600 text-white">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div>
            <div class="text-lg font-bold">
                {{Auth::user()->nama}}
              </div>
              <div class="text-sm text-gray-200">
                  {{now()->format('d M Y')}}
            </div>
        </div>

        <!-- Menu untuk layar besar -->
        <div class="hidden md:flex space-x-4">
          <a href="#" class="hover:underline">Q&A</a>
          <a href="#" class="hover:underline">Polls</a>
          <a href="#" class="hover:underline">Share</a>
          <a href="#" class="bg-green-500 px-3 py-1 rounded hover:bg-green-400">Chat Room</a>
        </div>
        <!-- Tombol menu untuk layar kecil -->
        <div class="md:hidden">
          <button id="menu-toggle" class="text-white">
            &#8942;
          </button>
        </div>
      </div>
      <!-- Dropdown menu untuk layar kecil -->
      <div id="menu" class="hidden md:hidden flex flex-col space-y-2">
        <a href="#" class="hover:underline">Q&A</a>
        <a href="#" class="hover:underline">Polls</a>
        <a href="#" class="hover:underline">Share</a>
        <a href="#" class="bg-green-500 px-3 py-1 rounded hover:bg-green-400">Present Mode</a>
      </div>
    </div>
  </nav>

  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('menu');
      menu.classList.toggle('hidden');
    });
  </script>

@endsection
