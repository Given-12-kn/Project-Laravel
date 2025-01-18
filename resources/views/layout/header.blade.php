<nav class="bg-gray-100">
  <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
      <div class="relative flex h-20 items-center justify-between">

      {{-- menu --}}
      <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-blue-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          {{-- icon hamburger ketika menu tidak aktif --}}
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>

          {{-- icon x ketika menu aktif --}}
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
          </button>
      </div>

      {{-- nav item & logo--}}
      <div class="flex flex-1 items-center justify-center">
          {{-- logo --}}
          <div class="flex md:absolute md:left-0 items-center">
              <img src="logo.png" alt="logo" style="width: 60px; height: 60px">
              <span class="customHeaderLogo:hidden text-lg font-bold">Opentalk</span>
          </div>

          {{-- nav item --}}
          <div class="hidden md:ml-6 md:block">
              <div class="flex space-x-4">
                  <a href="{{url('home/')}}" class="relative rounded-md px-3 py-2 text-lg font-medium text-black hover:text-gray-700 focus:text-gray-700 group" aria-current="page">Home
                  <span class="absolute left-0 bottom-0 h-0.5 w-full origin-center scale-x-0 bg-gray-700 transition-transform duration-300 group-hover:scale-x-100"></span>
                  </a>
                  <a href="#" class="relative rounded-md px-3 py-2 text-lg font-medium text-black hover:text-gray-700 focus:text-gray-700 group">Keluhan
                  <span class="absolute left-0 bottom-0 h-0.5 w-full origin-center scale-x-0 bg-gray-700 transition-transform duration-300 group-hover:scale-x-100"></span>
                  </a>
                  <a href="#" class="relative rounded-md px-3 py-2 text-lg font-medium text-black hover:text-gray-700 focus:text-gray-700 group">About Us
                  <span class="absolute left-0 bottom-0 h-0.5 w-full origin-center scale-x-0 bg-gray-700 transition-transform duration-300 group-hover:scale-x-100"></span>
                  </a>
                  <a href="{{url('live/')}}" class="relative rounded-md px-3 py-2 text-lg font-medium text-black hover:text-gray-700 focus:text-gray-700 group">live
                  <span class="text-red-500">⦿</span>
                  <span class="absolute left-0 bottom-0 h-0.5 w-full origin-center scale-x-0 bg-gray-700 transition-transform duration-300 group-hover:scale-x-100"></span>
                  </a>
              </div>
          </div>
      </div>

      <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
          <button type="button" class="relative rounded-full bg-blue-400 p-1 text-black-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
          </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">

              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="size-10 rounded-full" src="yoshi.png" alt="">
              </button>


              <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-blue/5 focus:outline-none hidden opacity-0 scale-95 transition-all duration-300"
                  role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div>

          </div>
      </div>
      </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="md:hidden hidden transition-all duration-200 transform origin-top scale-y-0" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
      <a href="{{url('home/')}}" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-blue-400 hover:text-black" aria-current="page">Home</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-blue-400 hover:text-black">Keluhan</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-blue-400 hover:text-black">About Us</a>
      <a href="{{url('live/')}}" class="block rounded-md px-3 py-2 text-base font-medium text-black hover:bg-blue-400 hover:text-black">Live <span class="text-red-500">⦿</span></a>
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