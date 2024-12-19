@extends('layout.template')

@section('title', 'ZZZ')

@section('content')

<p class="font-bold text-2xl">Welcome {{Auth::user()->username}}</p>

<form action="{{ url('home/kirim') }}" method="post" id="chatForm">
    @csrf
    <br>
    Chat :
    <textarea name="chat" value="" class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
    </textarea>
    <br>
    <input type="submit" value="kirim" class="w-48 my-3 my-3 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-medium transition duration-200">



</form>

<div id="kotak"></div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var myurl = "<?php echo URL::to('/'); ?>";
    $(document).ready(function () {
        $('#chatForm').submit(function (e) {
            e.preventDefault();

            const chat = $('textarea[name=chat]').val();

            $.ajax({
                type: "post",
                url: myurl + '/home/kirim',
                data: {
                    chat: chat,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    $('#kotak').append('<p>' + chat + '</p>');
                    $('textarea[name=chat]').val('');
                }
              

            });

        });
    });
</script>
{{-- Ini Suapay Mereka gak bisa nembak url langsung--}}
{{--Auth::logout();--}}

