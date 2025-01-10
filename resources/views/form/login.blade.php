@extends('layout.template')

@section('title', 'Form Login')

@section('no-header')
    no-header
@endsection
@section('content')
@extends('layout.bgform')

@section('contentBgForm')
<div class="container mx-auto">
    <div class="flex justify-center mt-18">
        <div class="w-full max-w-md bg-transparent p-10 rounded-lg shadow-lg">
            <h1 class="text-center text-3xl font-bold mb-6">Login</h1>
            <form action="{{ url('form/login/cekLogin') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nrp" class="block text-gray-700 font-medium mb-2">Nrp</label>
                    <input type="number" id="nrp" name="nrp"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Nrp" value="{{ old('nrp') }}">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Password">
                </div>
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-medium transition duration-200">
                    Login
                </button>
            </form>
        </div>
    </div>
    <div class="flex justify-center">
        @if (Session::has('fail'))
            <div class="mt-3 bg-red-100 text-red-700 p-4 rounded-lg w-full max-w-md">
                {{ Session::get('fail') }}
            </div>

        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="mt-3 bg-red-100 text-red-700 p-4 rounded-lg w-full max-w-md">
                    {{ $error }}
                </div>
            @endforeach
    @endif
    </div>
</div>
@endsection

@endsection
