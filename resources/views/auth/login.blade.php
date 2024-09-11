@extends('app')

@section('title' , 'Login')

@section('content')

<div class="flex gap-48 justify-center items-center mx-auto h-screen p-8xl">
    <div class="form-container animate-slideDown">
        <h1 class="text-8xl font-bold mb-8xl">Welcome to Kamuingi Group.</h1>
        <form action="{{route('login')}}"  autocomplete="off" method="POST">
            @csrf
            <div class="relative mb-5xl">
                <input role="presentation" type="email" name="email" placeholder="Email" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-email" />
                @if (session('invalid_email'))
                <p class="mt-4 text-4xl medium text text-red">{{session('invalid_email')}}</p>
                @endif
            </div>
            <div>
                <input role="presentation" type="password" name="password" placeholder="Password" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-password"/>

                @if (session('invalid_password'))
                <p class="mt-4 text-4xl font-medium text-red">{{session('invalid_password')}}</p>
                @endif
            </div>
            <button class="inline-block w-full text-6xl font-bold text-white bg-green-600 rounded-lg transition ease-linear delay-75 mb-5xl mt-5xl py-6xl hover:bg-green-800">Log In</button>
            <a href="{{route("register_page")}}" class="text-base font-medium text-green-700 hover:text-green-800">Create account</a>
        </form>
    </div>
        <img src="/Login.png"  class="w-[40%] animate-slideIn" alt="#">
</div>

@push("styles")
@vite(['resources/css/app.css' , 'resources/js/app.js'])
@endpush
@endsection
