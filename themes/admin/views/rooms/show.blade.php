@extends('layouts.app')

@section('title', 'Room | ' . $room->name)

@section('content')

<div class="container mt-12">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">{{ $room->name }}</h5>
        <a href="{{ route('admin.room') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="cols-12 col-md-7 mb-4">
            <div class="bg-white shadow-2xl">

                <div class="">
                    <img src="{{ $room->image }}" class="w-full object-center object-cover  rounded" />
                </div>
                <div class="mt-2 bg-white p-2 shadow-2xl rounded ">
                    <div class="flex justify-between items-center">
                        <small class="bg-green-400 py-1 px-1 rounded">{{ $room->status }}</small>
                        <p class="h5">
                            ₦150
                        </p>
                    </div>
                    <hr class="my-2" />
                    <h5 class="text-gray-600 font-mono">Room description</h5>
                     {!! $room->description !!}
                </div>
            </div>
        </div>
        <div class="cols-12 col-md-5">
            <div class="bg-white shadow p-2 rounded ">
                <h5 class="text-gray-600 font-mono">Room Details</h5>
                <p class="my-3"><b>No of People:</b> {{ $room->no_of_people }}</p>
                <p class="my-3"><b>No of Bed:</b> {{ $room->no_of_bed }}</p>
                <p class="my-3"><b>Date Created:</b> {{ $room->created_at }}</p>

            </div>
        </div>
    </div>
</div>

@endsection
