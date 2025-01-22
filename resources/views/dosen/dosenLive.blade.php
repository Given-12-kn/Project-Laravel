@extends('layout.template')

@section('title', 'dosen live')

@section('no-headerAdmin', true)
@section('no-header', true)

@section('content')
<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex justify-center w-full" style="min-height: calc(100vh - 50px)">
    <div class="bg-indigo-400 w-full max-w-6xl rounded-lg shadow-lg p-8 mt-12 mx-auto mx-4 md:mx-8 flex items-center justify-center" style="height: 80vh">
        @if($keluhan)
            <div class="w-full text-center break-words">
                <h4 class="text-3xl font-semibold text-center mb-4 text-gray-600">{{ $keluhan->deskripsi }}</h4>
            </div>
        @else
            <h4>Gak ada keluhan</h4>
        @endif
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  setInterval(function() {
    window.location.reload();
  }, 90000);
</script>
