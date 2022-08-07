@extends('layouts.app')

@section('title', $testimonial->name . ' Reviews')

@section('content')
        <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">{{ $testimonial->name }} Review</h5>
            <a href="{{ route('admin.testimonial') }}" class="btn btn-primary float-right rounded" ><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
            <div class="clearfix"></div>
        </div>

            <div class="row">
                <div class="cols-12 col-md-4">
                    <div class="bg-white mb-3 rounded-md shadow-2xl p-3">
                        <div class="">
                            <center>
                                <span class="avatar justify-center">
                                    <img src="{{ asset('assets/img/pic.jpg') }}" class="rounded-full w-32 object-center object-contain" />
                                </span>

                            </center>
                            <p class="text-center">
                                <span class="font-weight-bold">{{$testimonial->name}}</span><br>
                                <span class="small">{{$testimonial->email}}</span>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="cols-12 col-md-8">
                    <div class="bg-white shadow-2xl rounded-md p-3">
                        <p class="text-center text-lg font-weight-bold">
                            Review
                        </p>

                        <p class="mt-2">
                        <center>
                            {!! $testimonial->reviews !!}
                        </center>
                        </p>
                    </div>
                </div>
            </div>
        </section>
@endsection