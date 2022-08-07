@extends('layouts.app')

@section('title', 'New Booking')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/jquery-flexdatalist/jquery.flexdatalist.min.css') }}">
<style type="text/css">
    form,
    .form-control,
    select {
        font-size: .85rem;
    }

    #booking-info label,
    #guest-info label,
    #room-info label,
    #addition-info .col-form-label,
    #payment-info .col-form-label,
    table tr td,
    .table-striped th {
        color: #6c757d;
    }

    .table-striped th {
        font-weight: 600;
    }

    hr {
        margin: 1.2rem auto;
        background-color: #fff;
        border-top: 1px dashed #ccc !important;
    }

</style>
@endsection


@section('content')
<section class="py-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">New Booking</h5>
        <a href="{{ route('admin.booking') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>

    {{-- form --}}
    <div class="card">
        <div class="card-header">
            <h3 class="h6 mb-0">Create New Booking</h3>
        </div>
        <div class="card-body">

            <form class="form-horizontal" method="post" action="{{ route('admin.booking.store') }}">
                @csrf

                <section id="booking-info">
                    <h6 class="font-weight-medium text-primary mb-4">- Booking Info -</h6>

                    <div class="row">
                        <div class="form-group col-md-3 mb-4">
                            <label for="bookingid">Booking ID: <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control bg-white" disabled id="bookingid" name="bookingid" readonly value="{{ old('bookingid') }}">
                        </div>

                        <div class="form-group col-6 col-md-3 mb-4">
                            <label for="bookdate">Check in date: <sup class="text-danger">*</sup></label>
                            <input type="date" class="form-control" id="bookdate" name="check_in_date_time" required min="{{  date('Y-m-d') }}" value="">


                            @error('check_in_date_time')
                            <div class="error-message text-danger pl-1 mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-6 col-md-3 mb-4">

                            <label for="todate">Check out date: <sup class="text-danger">*</sup></label>
                            <input type="date" class="form-control" id="todate" name="check_out_date_time" required min="{{  date('Y-m-d') }}" value="{{ old('check_out_date_time') }}">


                            @error('check_out_date_time')
                            <div class="error-message text-danger pl-1 mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group col-md-3 mb-4">
                            <label for="guesttype">Guest: <sup class="text-danger">*</sup></label>
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="new" value="new" type="radio" name="guesttype" class="custom-control-input" {{ (old('guesttype') == 'new' ) ? 'checked' : '' }} @if (!old('gender')) checked @endif>
                                    <label for="new" class="custom-control-label">New</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="returning" value="returning" type="radio" name="guesttype" class="custom-control-input" {{ (old('guesttype') == 'returning' ) ? 'checked' : '' }}>
                                    <label for="returning" class="custom-control-label">Returning</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label for="bookingtype">Booking Type: <sup class="text-danger">*</sup></label>
                            <div class="col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="byphone" value="Online" type="radio" name="booking_type" class="custom-control-input">
                                    <label for="byphone" class="custom-control-label">Online</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="byemail" value="Offline" type="radio" name="booking_type" class="custom-control-input" checked>
                                    <label for="byemail" class="custom-control-label">Offline</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group col-md-3 mb-4">
                            <label for="staffname">Recorded By (Staff):</label>
                            <input type="text" class="form-control bg-white" name="staffname" id="staffname" readonly value="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <hr>
                </section> {{-- end of section booking-info --}}

                <div class="row">
                    <div class="col-md-6 mt-3">

                        <section id="guest-info">

                            <h6 class="font-weight-medium text-primary mb-4">- Guest Info -</h6>

                            <div id="div-new-guest">
                                <div class="form-group">
                                    <label for="name">Guest Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="error-message text-danger pl-1 mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address: <sup class="text-danger">*</sup></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="error-message text-danger pl-1 mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                      <label class="block mb-3 text-gray-600" for="">Gender</label>
                                      <input type="radio" required name="gender" class="text-yellow-500 border-yellow-500 outline-yellow-500 mr-2" value="male" /><span class="mr-2">Male</span>

                                      <input type="radio" required name="gender" class="text-yellow-500 border-yellow-500 outline-yellow-500 mr-2" value="female" />Female


                                 </div>

                                <div class="form-group">
                                    <label for="phone1">Phone: <sup class="text-danger">*</sup></label>
                                    <input type="tel" class="form-control" id="phone1" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone1')
                                    <div class="error-message text-danger pl-1 mt-1">
                                        <small>{{ $message }}</small>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-row mb-3">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6">


                                    </div>
                                </div>
                            </div> {{-- end of div new-guest --}}



                        </section> {{-- end of section guest-info --}}

                    </div>
                    <div class="col-md-6 mt-3">

                        <section id="room-info">

                            <h6 class="font-weight-medium text-primary mb-4">- Room Info -</h6>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="noofadult">No of Adults: <sup class="text-danger">*</sup></label>
                                        <input type="number" name="no_of_adult" id="noofadult" class="form-control" min="1" value="{{ old('no_of_adult', 1) }}">
                                        @error('no_of_adult')
                                        <div class="error-message text-danger pl-1 mt-1">
                                            <small>{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="no_of_children">No of Children:</label>
                                        <input type="number" name="no_of_children" id="no_of_children" class="form-control" min="0" value="{{ old('no_of_children', 0) }}">
                                    </div>
                                </div>
                            </div>
                            <div id="div-dynamic-input">
                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="roomtype">Room Type:</label>
                                            <select class="form-control roomtype" name="rooms[]" multiple>
                                                @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name }} | NGN {{ $room->price }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>No of Rooms:</label>
                                            <input type="number" class="form-control noofroom" name="noofroom[]" value="1" min="1">
                                        </div>
                                    </div>


                                </div>
                            </div>


                            {{-- availabiliy table not finish --}}

                        </section> {{-- end of section room-info --}}

                    </div>
                </div> {{-- end of row - includes guest & room info --}}
                <hr>


                <section id="payment-info">

                    <h6 class="font-weight-medium text-primary my-4">- Payment Info -</h6>

                    {{-- <div class="row mb-4">
                        <label class="col-form-label col-md-3 font-weight-bold" for="totalcost">Total: <sup class="text-danger">*</sup></label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control bg-white" name="total_cost" id="total_cost" value="{{ old('total_cost') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            @error('total_cost')
                            <div class="error-message text-danger pl-1 mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="row mb-4">
                        <label class="col-form-label col-md-3" for="paymenttype">Payment Method: <sup class="text-danger">*</sup></label>
                        <div class="col-md-9">
                            <select class="form-control" id="payment_type" name="payment_type">
                                <option value="1">Select Payment Type</option>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>

                            </select>
                            @error('payment_type')
                            <div class="error-message text-danger pl-1 mt-1">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    </div>


                </section> {{-- end of section payment info --}}

                <div class="form-group row mt-5">
                    <div class="col-md-9 ml-auto">
                        <button type="submit" class="btn btn-primary px-5">Save</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    {{-- form end --}}
</section>


{{-- Available Room Table --}}
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary font-weight-medium" id="exampleModalLabel">Hotel Riza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="font-weight-medium text-primary">- Available Rooms -</h6>
                <div class="table-responsive my-3">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Room Type</th>
                                <th style="text-align: center;">Max People</th>
                                <th style="text-align: center;">No of Available Rooms</th>
                                <th>Room No.</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-room">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
