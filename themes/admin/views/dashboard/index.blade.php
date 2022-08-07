@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<section class="py-5">
    <div class="row">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Bookings</h6><span class="text-gray">{{ admin()->totalBooking() }}</span>

                    </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-phone-volume"></i></div>
            </div>
        </div>
        {{-- @php alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.'); @endphp --}}

        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Rooms</h6><span class="text-gray">{{ admin()->totalRooms() }}</span>

                    </div>
                </div>
                <div class="icon text-white bg-green"><i class="fas fa-key"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Posts</h6><span class="text-gray">{{ admin()->totalPosts() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-blue"><i class="far fa-sticky-note"></i></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Guests</h6><span class="text-gray">{{ admin()->totalGuests() }}</span>
                    </div>
                </div>
                <div class="icon text-white bg-red"><i class="fas fa-user-friends"></i></div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="row mb-4">
        <div class="col-lg-7 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Bookings Summary</h2>
                </div>
                <div class="card-body">
                    <p class="font-weight-bold">Total Booking</p>
                    <div class="chart-holder mt-5 mb-5">
                        {{-- <canvas id="lineChartExample"></canvas> --}}
                        <div id="linechart" style="">
                            <h1 class="text-center font-weight-normal text-gray-700" style="font-size: 70px">
                                {{ $totalBooking }}

                            </h1>

                            <p class="font-weight-bold">Latest Booking</p>
                            <div class="row mt-6">
                                @forelse($latestBooking as $booking)
                                <div class="cols-12 col-md-6">
                                    <div class="rounded-md  shadow-2xl p-2 mb-3 bg-gray-300">


                                        <p class="font-weight-bold text-gray-700">Guest Details</p>
                                        <p class="mt-2 text-xs">{{ $booking->user->name }}</p>
                                        <p class="mt-2 text-xs">{{ $booking->user->email }}</p>
                                        <p class="mt-2 text-xs">{{ $booking->user->phone_no }}</p>

                                        <hr class="m-2" />

                                        <p class="font-weight-bold text-gray-700 mt-2">Booking info</p>
                                        <p class="mt-2 text-xs">Check in Date: {{ $booking->check_in_date_time }}</p>
                                        <p class="mt-2 text-xs">Check out Date: {{ $booking->check_out_date_time }}</p>
                                        <p class="mt-2 text-xs">Date: {{ $booking->created_at }}</p>
                                        <p class="align-right">


                                            <a href="{{ route('admin.booking.show', $booking->id) }}" class="mt-2 text-xs text-blue-700 ">
                                                <i class="fa fa-plus"></i>
                                                Read more</a>
                                        </p>

                                    </div>
                                </div>

                                @empty
                                   <p class="text-sm text-center w-100 absolute">No Booking Yet</p> 
                                @endforelse
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row align-items-center flex-row">
                        <div class="col-lg-5 mb-10">

                            <h2 class="mb-0 d-flex align-items-center">
                                <span>
                                </span><span class="dot bg-green d-inline-block ml-3"></span></h2>
                            <hr><small class="text-muted font-weight-bold text-md">Avaliable Rooms</small>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="font-weight-normal">
                                <span class="border-4 p-4 rounded-full border-green-700">

                                    {{ number_format($avaliableRooms) }}
                                </span>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row align-items-center flex-row">
                        <div class="col-lg-5 mb-10">
                            <h2 class="mb-0 d-flex align-items-center">
                                <span>
                                </span><span class="dot bg-violet d-inline-block ml-3"></span></h2>
                            <hr><small class="text-muted font-weight-bold text-md">Unavaliable Rooms</small>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="font-weight-normal">
                                <span class="border-4 p-4 rounded-full border-violet">

                                     {{ number_format($unavaliableRooms) }}

                                </span>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center flex-row">
                        <div class="col-lg-5 mb-10">
                            <h2 class="mb-0 d-flex align-items-center">
                                <span>
                                </span><span class="dot bg-yellow d-inline-block ml-3"></span></h2>
                            <hr><small class="text-muted font-weight-bold text-md">Total Feedbacks</small>
                        </div>
                        <div class="col-lg-7">
                            <h3 class="font-weight-normal">
                                <span class="border-4 p-4 rounded-full border-yellow-700">

                                     {{ number_format($totalFeedbacks) }}

                                </span>
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="bg-white shadow roundy p-4 d-flex align-items-center justify-content-between mb-4">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                        <h6 class="mb-0">Total Approved Feedbacks</h6>
                    </div>
                </div>
                <div class="icon bg-green text-white">
                <span class="font-weight-bold">{{ $totalApprovedFeedbacks < 100 ? number_format($totalApprovedFeedbacks) : "99+" }}</span>
                </div>
            </div>


            <div class="bg-white shadow roundy p-4 d-flex align-items-center justify-content-between mb-4">
                <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                        <h6 class="mb-2">
                           Total Feedbacks Not Yet Approved
                        </h6>
 
                    </div>
                </div>
                <div class="icon bg-violet text-white">
               {{ $totalNotApprovedFeedbacks < 100 ? number_format($totalNotApprovedFeedbacks) : "99+" }}
                </div>
            </div>
           
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Inbox Message</h2>
                </div>
                <div class="card-body">
                <div class="flex items-center justify-between">
                    <p class="text-gray">total inbox message</p>
                    <div>
                        <a href="{{ route('admin.inbox') }}" class="text-red-500">View all</a>
                    </div>
                </div>
                    <div class="chart-holder mt-5 mb-3">
                        <div class="">
                                     <h1 class="text-center font-weight-normal text-gray-700" style="font-size: 70px">
                                {{ $totalInboxMessage < 100 ? number_format($totalInboxMessage) : "99+" }}

                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
