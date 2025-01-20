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
                    <p class="text-xl">List of students who have registered</p>
                </div>
                <div class="card-body text-center">
                    <table class="table-auto border-collapse border border-gray-300 w-full">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 py-1">No</th>
                                <th class="border border-gray-300 px-2 py-1">Email</th>
                                <th class="border border-gray-300 px-2 py-1">Nama</th>
                                <th class="border border-gray-300 px-2 py-1">Nrp</th>
                                <th class="border border-gray-300 px-2 py-1">Role</th>
                                <th class="border border-gray-300 px-2 py-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data) && count($data) > 0)
                                @foreach ($data as $key => $row)
                                    <tr data-id="{{ $row->id_live_account }}">
                                        <td class="border border-gray-300 px-2 py-1">{{ $key + 1 }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $row->email }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ optional($row->toSiswa)->nama }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $row->nrp }}</td>
                                        <td class="border border-gray-300 px-2 py-1">{{ $row->role_account }}</td>
                                        <td class="border border-gray-300 px-2 py-1">
                                            <button class="status-toggle btn-status"
                                                data-id="{{ $row->id_live_account }}"
                                                data-status="{{ $row->is_active ? 'deactivate' : 'activate' }}"
                                                data-is-active="{{ $row->is_active }}">
                                                {{ $row->is_active ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="border border-gray-300 px-2 py-1" colspan="6">No Data</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
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

    $(document).ready(function() {

        $('.btn-status').each(function() {
        var button = $(this);
        var isActive = button.data('is-active');

        // Set warna tombol berdasarkan status aktif
        if (isActive) {
            button.addClass('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded');
            button.text('Deactivate');
        } else {
            button.addClass('bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded');
            button.text('Activate');
        }
    });
    
    $('.btn-status').on('click', function(e) {
        e.preventDefault(); // Mencegah form untuk dikirim secara langsung

        var button = $(this);
        var accountId = button.data('id');
        var action = button.data('status');

        // Mengirim permintaan AJAX ke server
        $.ajax({
            url: '/home/admin/editStatusSiswa', // URL untuk memproses status
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                liveAcId: accountId,
                action: action
            },
            success: function(response) {
                // Jika sukses, perbarui status tombol di UI
                if (response.success) {
                    var newStatus = action === 'activate' ? 'deactivate' : 'activate';
                    var newText = newStatus === 'activate' ? 'Activate' : 'Deactivate';
                    button.text(newText);
                    button.data('status', newStatus);

                    // Mengubah warna tombol sesuai status
                    if (newStatus === 'activate') {
                        button.removeClass('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded').addClass('bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded');
                    } else {
                        button.removeClass('bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded').addClass('bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded');
                    }
                } else {
                    alert('Failed to update status.');
                }
            },
            error: function() {
                alert('Error occurred while updating status.');
            }
        });
    });
});
</script>

@endsection
