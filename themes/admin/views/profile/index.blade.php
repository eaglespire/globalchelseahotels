@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="py-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">Profile</h5>
        <div class="clearfix"></div>
    </div>

    <div class="row">
        <div class="cols-12 col-md-5">
            <div class="bg-white p-3 shadow-2xl rounded-md mb-3">
                <p class="text-lg font-weight-normal text-gray-900 text-gray-700">Profile Information</p>
                <p class="mt-2 small">Update your account's profile information and email address. </p>

            </div>
        </div>

        <div class="cols-12 col-md-7">
            @livewire('admin.update-profile')

        </div>
    </div>
</section>

@endsection
