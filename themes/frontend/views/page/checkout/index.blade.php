@extends('layouts.app')

@section('title', 'Checkout')


@section('css')

<link rel="stylesheet" href="{{ asset('styles/about.css') }}">

@endsection


@section('content')
 @include('partial._top_nav', ['title' => 'Checkout'])


<div class="container">
    <div class="row">
        <div class="cols-12 col-md-5">
            <h4 class="text-2xl text-gray-700 font-bold mb-5 mt-5">Booking summary</h4>

            <div class=" max-w-md p-3 mb-5 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="items-center justify-between flex">

                    <h4 class="text-weight-bold">Check in Date:


                    </h4>
                    <h4 class="justify-end font-medium">{{ $session->get('check_in_date') }}</h4>

                </div>
                <hr />
                <div class="items-center justify-between flex">

                    <h4 class="text-weight-bold">Check out Date:
                    </h4>
                    <h4 class="justify-end font-medium">{{ $session->get('check_out_date') }}</h4>



                </div>

                <hr />

                <div class="items-center justify-between flex">

                    <h4 class="text-weight-bold">Adults:
                    </h4>
                    <h4 class="justify-end font-medium">{{ $session->get('no_of_adult') }}</h4>

                </div>

                <hr />

                <div class="items-center justify-between flex">

                    <h4 class="text-weight-bold">Children:
                    </h4>
                    <h4 class="justify-end font-medium">{{ $session->get('no_of_children') }}</h4>


                </div>

                <hr />


                <div class="items-center justify-between flex">

                    <h4 class="text-weight-bold">Total Rooms:
                    </h4>
                    <h4 class="justify-end font-medium">{{ $session->get('no_of_rooms') }}</h4>


                </div>

            </div>


            @foreach($rooms as $room)

            <div class="flex max-w-md mb-5 mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <div class="w-1/3 bg-cover" style="background-image: url({{ $room->image }})"></div>

                <div class="w-2/3 p-4 md:p-4">
                    <h1 class="text-xl text-gray-800 dark:text-white">{{ $room->name }}

                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{!! $room->description !!}</p>

                        <div class="flex justify-between mt-3 item-center">
                            <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl">₦{{ $room->price }}</h1>

                            <button class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Unbooked</button>
                        </div>
                </div>
            </div>
            @endforeach




        </div>


        <div class="cols-12 col-md-7">
            <h4 class="text-2xl font-bold mt-5 text-gray-700 mb-5">Personal information</h4>
            <div class="p-10 rounded-md shadow-md bg-white">
                <form action="{{ route('pay') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-3 text-gray-600" for="">Full Name</label>
                        <input type="text" required name="name" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-wider" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-3 text-gray-600" for="">Email Address</label>
                        <input type="email" name="email" required class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-3 text-gray-600" for="">Phone Number</label>
                        <input type="tel" required name="phone" class="border border-gray-500 rounded-md inline-block py-2 px-3 w-full text-gray-600 tracking-widest" />
                    </div>

                    <div class="mb-6">
                        <label class="block mb-3 text-gray-600" for="">Gender</label>
                        <input type="radio" required name="gender" class="text-yellow-500 border-yellow-500 outline-yellow-500 mr-2" value="male" /><span class="mr-2">Male</span>

                        <input type="radio" required name="gender" class="text-yellow-500 border-yellow-500 outline-yellow-500 mr-2" value="female" />Female

                    </div>

                    <div class="mb-6 text-right">
                        <span class="text-right font-bold">Total : ₦ {{ number_format($session->get('total_cost')) }}</span>


                    </div>
                    <div>
                        <button type="submit" class="w-full text-ceenter px-4 py-3 bg-green-500 rounded-md shadow-md text-white font-semibold">
                            Pay Now
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

@endsection
