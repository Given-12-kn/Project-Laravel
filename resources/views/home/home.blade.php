@extends('layout.template')

@section('title', 'ZZZ')

@section('content')

{{-- <p class="font-bold text-2xl">Welcome {{Auth::user()->username}}</p> --}}

<body class="flex flex-col h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl">Chat Room</h1>
    </header>

    {{-- <!-- Chat Messages -->
    <div class="flex-1 p-4 overflow-y-auto">
        <div class="space-y-4">
            <div class="flex justify-end">
                <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs">
                    Halo! Bagaimana kabarmu?
                </div>
            </div>
            <!-- Pesan dari penerima -->
            <div class="flex justify-start">
                <div class="bg-gray-300 text-gray-800 p-2 rounded-lg max-w-xs">
                    Saya baik, terima kasih! Ada yang bisa saya bantu?
                </div>
            </div>
        </div>
    </div> --}}

        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 p-4 overflow-y-auto">

        </div>


    <div class="p-4 bg-white border-t">
        <form class="flex" action="{{ url('home/kirim') }}" method="POST" id="chatForm">
            @csrf
            <input type="text" name="message" id="inputText" placeholder="Ketik pesan..." class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <button type="submit" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                Kirim
            </button>
        </form>
    </div>
</body>



@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var myurl = "<?php echo URL::to('/'); ?>";
    $(document).ready(function () {
        $('#chatForm').submit(function (e) {
            e.preventDefault();

            var chat = $('#inputText').val();

            $.ajax({
                type: "post",
                url: myurl + '/home/kirim',
                data: {
                    chat: chat,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    $('#chat-messages').append( `<div class="flex justify-center mb-2">
                        <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs text-center w-full">
                            ${chat}
                        </div>
                    </div>`);
                    $('#inputText').val('');
                }

            });

        });
    });

    function loadMessage(){
        $.ajax({
            type: "GET",
            url: myurl + '/home/loadMessage',
            data: "data",
            success: function (response) {
                $('#chat-messages').html('');
                response.forEach(element => {
                    $('#chat-messages').append( `<div class="flex justify-center mb-2">
                        <div class="bg-blue-500 text-white p-2 rounded-lg max-w-xs text-center w-full">
                            ${element.chat}
                        </div>
                    </div>`);
                });
            }
        });
    }

    setInterval(() => {
        loadMessage();
    }, 1000);
</script>
{{-- Ini Suapay Mereka gak bisa nembak url langsung--}}
{{--Auth::logout();--}}

