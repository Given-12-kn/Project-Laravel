<nav class="bg-gradient-to-r from-blue-400 via-white to-blue-400 shadow-lg">
    <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="relative flex h-20 items-center justify-between">

            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{asset('logo.png')}}" alt="logo" style="width: 50px; height: 50px;">
                <span class="ml-2 text-lg font-bold text-black">Opentalk</span>
            </div>

            <!-- Welcome Admin -->
            <div class="text-center text-2xl font-semibold text-gray-700">
                Welcome Admin , {{ Auth::user()->nama}}
            </div>

            <!-- Notification & Profile -->
            <div class="flex items-center space-x-4">
                <button type="button" class="relative rounded-full bg-blue-400 p-2 text-white hover:bg-blue-600 focus:outline-none">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>

                <div class="relative">
                    <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-10 w-10 rounded-full" src="{{asset('yoshi.png')}}" alt="">
                    </button>

                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 hidden"
                        role="menu" aria-orientation="vertical">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    //hamburger menu
    const menuToggleButton = document.querySelector('[aria-controls="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    const icons = menuToggleButton.querySelectorAll('svg');

    menuToggleButton.addEventListener('click', () => {
      const isExpanded = menuToggleButton.getAttribute('aria-expanded') === 'true';

      if (isExpanded) {
        mobileMenu.classList.add('scale-y-0');
        mobileMenu.classList.remove('scale-y-100');
        setTimeout(() => {
          mobileMenu.classList.add('hidden');
        }, 100);
      } else {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
          mobileMenu.classList.remove('scale-y-0');
          mobileMenu.classList.add('scale-y-100');
        }, 0);
      }

      icons.forEach(icon => icon.classList.toggle('hidden'));

      menuToggleButton.setAttribute('aria-expanded', !isExpanded);
    });

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
@extends('layout.sideBar')
