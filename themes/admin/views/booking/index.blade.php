@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/datatables/datatables.min.css') }}">
@endsection


@section('content')
@livewire('admin.booking-list')
@endsection

@section('script')

@endsection
