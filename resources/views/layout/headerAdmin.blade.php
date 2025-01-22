<nav class="bg-gradient-to-r from-blue-400 via-white to-blue-400 shadow-lg">
    <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">

            {{-- menu --}}

            <div class="flex items-center">
                <img src="{{asset('logo.png')}}" alt="logo" style="width: 50px; height: 50px;">
                <span class="ml-2 text-lg font-bold text-black">Opentalk</span>
            </div>

            {{-- Centered Welcome Text --}}
            <div class="relative flex flex-1 items-center justify-center text-center text-2xl font-bold gradient-text h-20">
                <span class="hidden md:inline">Welcome Admin, </span>
                {{ Auth::user()->nama }}
            </div>

            {{-- Right side --}}
            <div class="relative inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="size-10 rounded-full" src="{{asset('yoshi.png')}}" alt="">
                    </button>

                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-blue/5 focus:outline-none hidden opacity-0 scale-95 transition-all duration-300" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{url('home/logout')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>    
    //profile
    const userMenuButton = document.getElementById('user-menu-button');
    const dropdownMenu = userMenuButton.nextElementSibling;

    userMenuButton.addEventListener('click', () => {
      const isExpanded = userMenuButton.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        dropdownMenu.classList.remove('opacity-100', 'scale-100');
        dropdownMenu.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
          dropdownMenu.classList.add('hidden');
        }, 300);
      } else {
        // Buka dropdown dengan animasi
        dropdownMenu.classList.remove('hidden');
        setTimeout(() => {
          dropdownMenu.classList.remove('opacity-0', 'scale-95');
          dropdownMenu.classList.add('opacity-100', 'scale-100');
        }, 0);
      }

      userMenuButton.setAttribute('aria-expanded', !isExpanded);
    });

    //logout
    const logoutButton = document.getElementById('user-menu-item-2');
      logoutButton.addEventListener('click', () => {
         window.location.href = 'home/logout';
      });


  </script>

<style>
    .gradient-text {
        /* background: linear-gradient(45deg, #6a11cb, #2575fc); */
        background: linear-gradient(45deg, #ec4899, #3b82f6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>


@extends('layout.sideBar')
