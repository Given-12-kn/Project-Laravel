@extends('layout.template')

@section('title', 'Home')
@section('no-header', true)
@section('no-headerDosen', true)

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

@section('content-sidebar')
<div class="containerContentSidebar d-flex align-items-center justify-content-center min-h-screen" style="background-color: #f8f9fa;"> 
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header text-center h-16 align-items-center pt-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <p class="text-xl">Live Setting</p>
                </div>
                <div id="statusContainer" class="statusContainer card-body text-center bg-white p-6 shadow rounded">
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
                <div class="mt-4 text-center opacity-60">
                    <button id="arrow-btn" class="focus:outline-none">
                        <ion-icon name="arrow-up" id="arrow-icon" style="font-size: 24px;"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 mx-auto w-full" style="height: 60vh;"> 
        <div class="text-center bg-indigo-400 p-6 shadow rounded h-full flex flex-col justify-center">
            <div id="keluhan-container" class="text-center bg-indigo-400 p-6 shadow rounded h-full flex flex-col justify-center break-words">
                @if($keluhan)
                    <h1 class="text-3xl text-gray-600" id="deskripsi-keluhan">{{ $keluhan->deskripsi }}</h1>
                @else
                    <h1 class="text-3xl text-gray-600">Add any additional text or content here as needed.</h1>
                @endif
            </div>
        </div>
        <div class="text-center flex justify-between mt-4">
            <form action="{{ url("/home/admin/updateprev") }}" method="POST">
                @csrf
                <input type="hidden" value="{{$keluhan->id_keluhan}}" name="id_keluhan">
                <input type="submit" class="px-12 py-2 bg-blue-500 text-white font-semibold rounded transition duration-300 hover:bg-blue-600 hover:scale-105" value="Prev">
            </form>
            <form action="{{ url("/home/admin/updatenext") }}" method="POST">
                @csrf
                <input type="hidden" value="{{$keluhan->id_keluhan}}" name="id_keluhan">
                <input type="submit" class="px-12 py-2 bg-blue-500 text-white font-semibold rounded transition duration-300 hover:bg-blue-600 hover:scale-105" value="Next">
            </form>
        </div>
    </div>
    
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const toggleButton = $('#toggle-btn');
        const statusMessage = $('#status-message');
        const arrowButton = $('#arrow-btn');
        const statusContainer = $('#statusContainer');
        const arrowIcon = $('#arrow-icon');

        var myurl = "<?php echo URL::to('/'); ?>";

        toggleButton.on('click', function (event) {
            const isActive = toggleButton.hasClass('bg-green-500');
            const chatStatus = !isActive;

            if (isActive) {
                toggleButton.removeClass('bg-green-500 hover:bg-green-600').addClass('bg-red-500 hover:bg-red-600');
                toggleButton.text('Turn ON');
                statusMessage.text('Live Chat OFF').removeClass('text-green-500').addClass('text-red-500');
            } else {
                toggleButton.removeClass('bg-red-500 hover:bg-red-600').addClass('bg-green-500 hover:bg-green-600');
                toggleButton.text('Turn OFF');
                statusMessage.text('Live Chat ON').removeClass('text-red-500').addClass('text-green-500');
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

        arrowButton.on('click', function () {
            const isVisible = statusContainer.is(':visible');

            if (isVisible) {
                statusContainer.slideUp(300, function () {
                    arrowIcon.attr('name', 'arrow-down');
                });
            } else {
                statusContainer.slideDown(300, function () {
                    arrowIcon.attr('name', 'arrow-up');
                });
            }
        });
    });
</script>

@endsection
