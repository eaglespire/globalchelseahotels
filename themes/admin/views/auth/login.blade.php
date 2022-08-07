@extends('layouts.auth')

@section('content')


<div class="w-1/2 shadow-2xl">
    <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('images/login.png') }}" />
</div>


<div class="bg-white p-8 md:p-12 my-10 rounded-lg shadow-2xl w-full md:w-1/2 flex flex-col">


    <section>
        <center>
            <img src="{{ asset('images/favicon.png') }}" class="object-cover object-center object-contain w-14" />
        </center>
        <h1 class="text-center font-bold text-3xl my-4 text-gray-700">
            Welcome Back!
        </h1>
        <div class="mx-auto my-6 w-24 border-b-2"></div>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-6 pt-3 rounded">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="email" id="email" class="@error('email')border-red-500 @enderror bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <p class="mt-4 text-xs italic text-red-500">
                    {{ $message }}
                </p>
                @enderror

            </div>
            <div class="mb-6 pt-3 rounded">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                <input type="password" id="password" class="@error('password') border-red-500 @enderror bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-blue-600 transition duration-500 px-3 pb-3" name="password" required>
                @error('password')
                    <p class="mt-4 text-xs italic text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="flex justify-end">
                <a href="{{ route('admin.password.request') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline mb-6">Forgot your password?</a>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
        </form>
    </section>
</div>
@endsection
