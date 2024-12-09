@extends('layout.template')

@section('title', 'Register')
@section('content')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            {{ $error }}
        </div>
    @endforeach

@endif
<div class="container mx-auto">
    <div class="flex justify-center mt-20">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-center text-2xl font-bold mb-6">Login</h1>
            <form action="{{ url('form/register/add') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Email" value="{{old('email')}}">
                </div>
                <div class="mb-4">
                    <label for="nrp" class="block text-gray-700 font-medium mb-2">Nrp</label>
                    <input type="number" id="nrp" name="nrp"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Nrp">
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" id="username" name="username"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Username" value="{{ old('username') }}">
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Name">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" value=""
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                           placeholder="Enter Your Password">
                </div>
                <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-medium transition duration-200">
                    Register
                </button>
            </form>
            <div class="mt-2 text-center">
                <span class="text-gray-700">Already have an account?</span>
                <a href="{{ url('/form/login') }}" class="text-blue-500 hover:underline"> Login</a>
            </div>
            @if(Session::has('fail'))
                <div class="mt-4 bg-red-100 text-red-700 p-4 rounded-lg">
                    {{ Session::get('fail') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
