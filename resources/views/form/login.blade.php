@extends('layout.template')

@section('title', 'Form Login')

@section('content')

<div class="container mx-auto">
    <div class="flex justify-center mt-20">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-center text-2xl font-bold mb-6">Login</h1>
            <form action="{{ url('form/login/cekLogin') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="text" id="username" name="email"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Email" value="{{ old('Email') }}">
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
            <div class="mt-4 text-center">
                <a href="{{url('form/resetPassword')}}" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
            <div class="mt-2 text-center">
                <span class="text-gray-700">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline"> Sign Up</a>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
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
