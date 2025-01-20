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
                    <p class="text-xl">Live Setting</p>
                </div>
                <div class="card-body text-center bg-white p-6 shadow rounded">
                    @if($bladeStatus == "false")
                    <h3 id="status-message" class="text-lg font-semibold text-gray-700 mb-4 text-red-500">Live Chat OFF</h3>
                    <button
                        id="toggle-btn"
                        class="px-4 py-2 text-white font-semibold rounded transition duration-300 bg-red-500 hover:bg-red-600">
                        Turn ON
                    </button>
                    @else
                    <h3 id="status-message" class="text-lg font-semibold text-gray-700 mb-4 text-green-500">Live Chat ON</h3>
                    <button
                        id="toggle-btn"
                        class="px-4 py-2 text-white font-semibold rounded transition duration-300 bg-green-500 hover:bg-green-600">
                        Turn OFF
                    </button>
                    @endif
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


     const toggleButton = document.getElementById('toggle-btn');
        const statusMessage = document.getElementById('status-message');

        var myurl = "<?php echo URL::to('/'); ?>";
        toggleButton.addEventListener('click', function (event) {


    const isActive = toggleButton.classList.contains('bg-green-500');
    var chatStatus = !isActive; // Status baru: true untuk ON, false untuk OFF
    if (isActive) {
        toggleButton.classList.remove('bg-green-500', 'hover:bg-green-600');
        toggleButton.classList.add('bg-red-500', 'hover:bg-red-600');
        toggleButton.textContent = 'Turn ON';
        statusMessage.textContent = 'Live Chat OFF';
        statusMessage.classList.remove('text-green-500');
        statusMessage.classList.add('text-red-500');
    } else {
        toggleButton.classList.remove('bg-red-500', 'hover:bg-red-600');
        toggleButton.classList.add('bg-green-500', 'hover:bg-green-600');
        toggleButton.textContent = 'Turn OFF';
        statusMessage.textContent = 'Live Chat ON';
        statusMessage.classList.remove('text-red-500');
        statusMessage.classList.add('text-green-500');
    }

    // AJAX Request
    $.ajax({
        type: "post",
        url: myurl + '/home/admin/turnLive',
        data: {
            chat: chatStatus,
            _token: "{{ csrf_token() }}",
        },
        success: function (response) {
            if (response.success) {
                console.log(response.message);
            } else {
                console.error('Failed to update status.');
            }
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });

    event.preventDefault();
});


</script>

@endsection
