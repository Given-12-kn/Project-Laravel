<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff]" style="height: 100vh;">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-blue-600 text-white flex flex-col transition-transform duration-300 transform translate-x-0">
            <div class="h-20 flex items-center justify-between bg-blue-700 px-4">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <!-- Close Button -->
                <button onclick="hideSidebar()" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="flex-grow">
                <ul class="space-y-2 mt-4">
                    <li>
                        <a href="{{url('home/admin/')}}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 22V12h6v10" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('home/admin/DataSessionAcc') }}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <x-cri-fct class="h-5 w-5 text-white" />
                            <span class="ml-3 text-white">Live Session Acc</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('home/admin/DataKeluhanAcc') }}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <x-forkawesome-tripadvisor class="h-5 w-5 text-white" />
                            <span class="ml-3 text-white">Live Keluhan Acc</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('home/admin/daftarSiswa')}}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-1a4 4 0 00-4-4H6a4 4 0 00-4 4v1h5M9 10a4 4 0 118 0m-4 6v4" />
                            </svg>
                            <span class="ml-3">Daftar Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('home/admin/liveSetting') }}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A2 2 0 0020 6.18V4a2 2 0 00-2-2h-4.058A2 2 0 0012.295 3l-.817 1.639A2 2 0 019.945 5.5H5a2 2 0 00-2 2v8a2 2 0 002 2h4.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l4.553-2.276A2 2 0 0020 9.82v-1.64a2 2 0 00-1.053-1.764L15 5M15 17a2 2 0 100 4 2 2 0 000-4z" />
                            </svg>
                            <span class="ml-3">Live Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('home/admin/excel') }}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <x-fileicon-microsoft-excel class="h-5 w-5 text-white" />
                            <span class="ml-3 text-white">Add Excel Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('home/admin/listDataAcc') }}" class="flex items-center px-4 py-2 hover:bg-blue-500">
                            <x-elemplus-list class="h-5 w-5 text-white" />
                            <span class="ml-3 text-white">List Acc Reviews</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <div id="content" class="transition-all duration-300" style="width: calc(100% - 16rem);">
            <button id="openSidebarBtn" class="hidden bg-blue-500 p-2 rounded focus:outline-none" onclick="showSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            @yield('content-sidebar')

        </div>
    </div>
</div>
