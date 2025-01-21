@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@section('content-sidebar')

<div class="container d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header text-center h-16 align-items-center pt-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <p class="text-xl">List Acc</p>
                </div>
                <div class="card-body text-center">
                    <div class="row flex flex-col sm:flex-row items-center justify-center p-3 space-y-3 sm:space-y-0 sm:space-x-4 shadow-xl">
                        <div class="col-md-3 w-1/2 p-3 ">
                            <div class="p-3" style="background: linear-gradient(to right, #f9af98, #ebb67b, #ffd700);">
                                <div class="text-white text-lg font-semibold">
                                    Live Session
                                </div>
                            </div>

                            <div class="mt-4 text-gray-700 text-lg">
                                Teks tambahan di bawah yang terpisah dari latar belakang gradien.
                            </div>
                        </div>

                        <div class="col-md-3 w-1/2 p-3 rounded-xl shadow-lg" style="background: linear-gradient(to right, #00c6ff, #ffdd00);">
                            <div class="text-white text-xl font-semibold">
                                Keluhan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    function hideSidebar() {
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const content = document.getElementById('content');


        sidebar.style.transform = 'translateX(-100%)'; // Geser sidebar ke kiri
        openSidebarBtn.classList.remove('hidden'); // Tampilkan tombol buka
        content.style.marginLeft = '0'; // Hilangkan margin kiri konten
        content.style.width = '100%'; // Perluas konten sepenuhnya


    }

    function showSidebar() {
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('openSidebarBtn');
        const content = document.getElementById('content');

        sidebar.style.transform = 'translateX(0)'; // Kembalikan sidebar ke posisi awal
        openSidebarBtn.classList.add('hidden'); // Sembunyikan tombol buka
        content.style.width = 'calc(100% - 16rem)'; // Kembalikan ukuran konten semula

    }

</script>

@endsection
