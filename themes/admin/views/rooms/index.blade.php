@extends('layouts.app')

@section('title', 'Rooms')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/datatables/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/jquery-nice-select/nice-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/bootstrap/css/bootstrap-table.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/bootstrap/css/bootstrap-table-fixed-columns.min.css') }}">

<style type="text/css">
    .table-checkinlist th,
    .table-checkinlist td {
        color: #6c757d;
        font-size: .8rem;
    }

    .table-checkinlist th {
        font-weight: 600;
    }

    .nice-select {
        height: 38px;
    }

    .bg-today {
        background-color: #FBF9F4;
    }

    .bg-weekend {
        background-color: #fbfbfb;
    }

</style>
@endsection


@section('content')

    @livewire('admin.room-list')


@endsection

@section('script')
{{-- @include('partial._rooms_script') --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
