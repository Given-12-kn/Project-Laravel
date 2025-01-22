@extends('layout.template')

@section('title', 'dosen live')

@section('no-headerAdmin', true)
@section('no-header', true)

@section('content')
<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex justify-center w-full" style="min-height: calc(100vh - 50px)">
    <div class="bg-indigo-500 w-full max-w-6xl rounded-lg shadow-lg p-8 mt-8 mx-auto mx-4 md:mx-8" style="height: 80vh">
        <h1 class="text-2xl font-semibold text-center mb-4">Keluhan</h1>
        @if($keluhan)
            <h2 class="text-2xl font-semibold text-center mb-4">{{ $keluhan->judul_keluhan }}</h2>
            <h4 class="text-2xl font-semibold text-center mb-4">{{ $keluhan->deskripsi }}</h4>
        @else
            <h4>Gak ada keluhan</h4>
        @endif
    </div>
</div>
@endsection


