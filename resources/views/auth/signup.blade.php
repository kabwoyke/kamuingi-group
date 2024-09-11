@extends('app')

@section('title' , 'SignUp')

@section('content')

<div class="flex gap-48 justify-center items-center mx-auto h-screen p-8xl">
    <div class="form-container animate-slideDown">
        <h1 class="text-8xl font-bold mb-8xl">Welcome to Kamuingi Group.
            <span class="block">Create  <span class="text-green-600">Account</span></span>

        </h1>
        <form action="{{ route('signup') }}" autocomplete="off" method="POST">
            @csrf
            <div class="relative mb-5xl">
                <input  name="first_name" type="text" placeholder="First Name" id="first_name" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-text" />
                @error('first_name')
                    <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
                @enderror

            </div>

            <div class="relative mb-5xl">
                <input  name="last_name" type="text" placeholder="Last Name" id="last_name" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-text" />
                @error('last_name')
                <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
            @enderror
            </div>

            <div class="relative mb-5xl">
                <input  name="id_number" type="text" placeholder="ID" id="id_number" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-text" />
                @error('id_number')
                <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
                @enderror
            </div>

            <div class="relative mb-5xl">
                <input  name="phone_number" type="text" placeholder="Phone Number" id="email" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-text" />
                @error('phone_number')
                <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
            @enderror
            </div>
            <div class="relative mb-5xl">
                <input  name="email" type="email" placeholder="Email" id="email" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-email" />
                @error('email')
                <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
                @enderror

                @if (session('email_exists'))
                <p class="mt-9 text-4xl font-medium text-red">{{session('email_exists')}}</p>
                @endif
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" id="email" class="w-full text-6xl rounded-md border border-green-500 h-8xl p-4xl outline-green-300" autocomplete="new-password"/>
                @error('password')
                <p class="mt-9 text-4xl font-medium text-red">{{$message}}</p>
                @enderror
            </div>
            <button class="inline-block w-full text-6xl font-bold text-white bg-green-600 rounded-lg transition ease-linear delay-75 mb-5xl mt-5xl py-6xl hover:bg-green-800">Sign Up</button>
            <a href="{{ route('login_page') }}" class="text-base font-medium text-green-700 hover:text-green-800">Log in</a>
        </form>
    </div>
        <img src="/Sign up-amico.png"  class="w-[40%] animate-slideIn" alt="#">
</div>

@push("styles")
@vite(['resources/css/app.css' , 'resources/js/app.js'])
@endpush

@endsection
