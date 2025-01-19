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
                    <table class="ttable-auto border-collapse border border-gray-300 w-full">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 py-1">No</th>
                                <th class="border border-gray-300 px-2 py-1">Email</th>
                                <th class="border border-gray-300 px-2 py-1">Nama</th>
                                <th class="border border-gray-300 px-2 py-1">Nrp</th>
                                <th class="border border-gray-300 px-2 py-1">Role</th>
                                <th class="border border-gray-300 px-2 py-1">Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data) && count($data) > 0)
                            @foreach ( $data as $key => $row )
                            <tr>
                                <td class="border border-gray-300 px-2 py-1">{{ $key + 1}}</td>
                                <td class="border border-gray-300 px-2 py-1">{{ $row->email }}</td>
                                <td class="border border-gray-300 px-2 py-1">{{ optional($row->toSiswa)->nama }}</td>
                                <td class="border border-gray-300 px-2 py-1">{{ $row->nrp }}</td>
                                <td class="border border-gray-300 px-2 py-1">{{ $row->role_account }}</td>
                                <td class="border border-gray-300 px-2 py-1">{{ $row->is_active ? 'Active' : 'Inactive' }}</td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td  class="border border-gray-300 px-2 py-1"> No Data</td>
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

<style>
    .btn-primary:hover, .btn-success:hover {
    background-color: #2575fc;
    transform: scale(1.05);
    transition: all 0.3s ease;
}

/* Browse File Button Styling */
.btn-primary {
    background-color: #6a11cb;
    border: none;
    font-size: 16px;
    transform: scale(1.05);
    transition: all 0.3s ease;
}

.btn-success {
    font-size: 16px;
}
</style>
@endsection
