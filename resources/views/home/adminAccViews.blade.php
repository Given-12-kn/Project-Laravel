@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)
@section('no-headerDosen', true)

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
@section('content-sidebar')

<div class="containerAccView1 d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;">
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
                                @php
                                    $data = 0;
                                @endphp
                                @if (isset($dataLs) && count($dataLs) > 0)
                                @foreach ($dataLs as $row )
                                @if ($row->is_acc == 2)
                                @php $data = 1; @endphp

                                <tr>
                                    <td class="border border-gray-300 px-6 py-4 w-80">
                                        <button data-id="{{ $row->id_live_session }}" data-action="accept"
                                        class="action-button bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-xl">
                                            Accept
                                        </button>
                                        <button data-id="{{ $row->id_live_session }}" data-action="decline"
                                         class="action-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl">
                                            Decline
                                        </button>
                                    </td>
                                    <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                        {{-- {{optional($row->toLa->toSiswa)->nama}} :  --}}
                                        {{$row->content}}
                                    </td>
                                </tr>
                                @endif

                                @endforeach
                                @if ($data == 0)
                                    <tr>
                                        <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                            No Data Available
                                        </td>

                                        <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                            No Data Available
                                        </td>
                                    </tr>
                                @endif
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

    var myurl = "<?php echo URL::to('/'); ?>";
    $(document).ready(function () {
        $('.action-button').on('click', function (e) {
            e.preventDefault();

            const id = $(this).data('id');
            const action = $(this).data('action');
            const row = $(this).closest('tr');
            const tableBody = row.closest('tbody');

            $.ajax({
                type: "post",
                url: myurl + "/home/admin/accSession",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    action: action
                },
                success: function (response) {
                    console.log(response);
                    row.remove();
                    if (tableBody.children('tr').length === 0) {
                        tableBody.append(`
                            <tr>
                               <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                            No Data Available
                                        </td>

                                        <td class="border border-gray-300 px-6 py-4 text-gray-700 text-lg">
                                            No Data Available
                                        </td>
                            </tr>
                        `);
                    }
                },
                error: function () {
                    console.log('Error: Failed to update status');
                }
            });
       });
    });

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

<style>
    .table-auto {
        table-layout: fixed;
        width: 100%;
    }

    .table-auto th, .table-auto td {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .action-button {
        display: inline-block;
        padding: 8px 20px;
        text-align: center;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
    }

    .card-body {
        padding: 0;
    }

    .card-body table {
        width: 100%;
    }

    .table-auto td:first-child {
        vertical-align: middle;
        text-align: center;
        padding: 12px;
    }

    .table-auto td:nth-child(2) {
        word-wrap: break-word;
        white-space: normal;
        max-width: calc(100% - 150px);
    }

    .table-auto td {
        padding: 12px;
    }

    .table-auto td .action-button {
        width: auto;
        margin: 5px;
    }

    .table-auto td .action-button.bg-green-500 {
        background-color: #38a169;
    }

    .table-auto td .action-button.bg-red-500 {
        background-color: #e53e3e;
    }

    .action-button:hover {
        opacity: 0.9;
    }
</style>


@endsection
