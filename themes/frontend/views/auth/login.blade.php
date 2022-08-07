@extends('layouts.auth')

@section('content')

<section>
    <h3 class="font-bold text-2xl">Welcome to Back</h3>
    <p class="text-gray-600 pt-2">Sign in to your account.</p>
</section>

<section class="mt-10">
    <form class="flex flex-col" method="POST" action="{{ route('login') }}">
    @csrf
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
            <input type="email" id="email" class="@error('email')border-red-500 @enderror bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <p class="mt-4 text-xs italic text-red-500">
                {{ $message }}
            </p>
            @enderror

        </div>
        <div class="mb-6 pt-3 rounded bg-gray-200">
            <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
            <input type="password" id="password" class="@error('password') border-red-500 @enderror bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" name="password" required>
            @error('password')
            <p class="mt-4 text-xs italic text-red-500">
                {{ $message }}
            </p>
            @enderror


        </div>
        <div class="flex justify-end">
            <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:text-purple-700 hover:underline mb-6">Forgot your password?</a>
        </div>
        <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
    </form>
</section>
</main>

<div class="max-w-lg mx-auto text-center mt-12 mb-6">
    <p class="text-white">Don't have an account? <a href="{{ route('register') }}" class="font-bold hover:underline">Sign up</a>.</p>
</div>

@endsection
