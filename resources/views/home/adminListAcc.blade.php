@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)
@section('no-headerDosen', true)
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@section('content-sidebar')

<div class="container d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header text-center h-16 align-items-center pt-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <p class="text-xl">List Live Session Acc</p>
                </div>
                <div class="card-body text-center">
                    <div class="row flex flex-col sm:flex-row items-center justify-center p-3 space-y-3 sm:space-y-0 sm:space-x-4 shadow-xl">
                        <table class="table-auto border-collapse border border-gray-300 w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-6 py-4 text-left text-center text-white text-xl"
                                    style="background: linear-gradient(to right, #f9af98, #ebb67b, #ffd700);" >Action</th>
                                    <th class="border border-gray-300 px-6 py-4 text-left text-center text-white text-xl"
                                    style="background: linear-gradient(to right, #ffdd00,#00c6ff);">Text</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if (isset($dataLs) && count($dataLs) > 0)

                                @foreach ($dataLs as $row )
                                <tr>
                                    @if ($row->is_acc == 1)
                                    <td class="border border-gray-300 px-6 py-4 w-80"> <p class="action-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl"> Accepted </p> </td>
                                    @elseif($row->is_acc == 0)
                                    <td class="border border-gray-300 px-6 py-4 w-80"> <p class="action-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl"> Declined </p> </td>
                                    @endif

                                        <td class="border border-gray-300 px-6 py-4 w-80">{{$row->content }}</td>
                                    </tr>
                                @endforeach
                              @else
                                <tr>
                                    <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                        No Data Available
                                    </td>
                                    <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                        No Data Available
                                    </td>
                                </tr>
                              @endif

                              @if(isset($dataKl) && count($dataKl) > 0)
                                @foreach ($dataLs as $row2 )
                                <tr>
                                @if ($row2->status_keluhan == 1)
                                <td class="border border-gray-300 px-6 py-4 w-80"> <p class="action-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl"> Accepted </p> </td>
                                @elseif($row2->status_keluhan == 0)
                                <td class="border border-gray-300 px-6 py-4 w-80"> <p class="action-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl"> Declined </p> </td>
                                @endif
                                    <td class="border border-gray-300 px-6 py-4 w-80">{{$row2->content }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                        No Data Available
                                    </td>
                                    <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                        No Data Available
                                    </td>
                                </tr>
                              @endif
                            </tbody>
                        </table>
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
