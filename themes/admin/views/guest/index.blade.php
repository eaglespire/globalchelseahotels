@extends('layouts.app')

@section('title', 'Guest')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/datatables/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/sumoselect/sumoselect.min.css') }}">

<style type="text/css">
    #report-form label {
        font-size: .8rem;
    }

    .custom-control-label {
        font-size: .9rem !important;
    }

    .SumoSelect {
        width: 100%;
    }

    .SumoSelect>.CaptionCont {
        border: 1px solid #ced4da;
        height: calc(1.5em + .75rem + 2px);
        border-radius: 4px;
    }

    .SumoSelect.open>.CaptionCont,
    .SumoSelect:focus>.CaptionCont {
        box-shadow: 0 0 0 0.2rem rgba(205, 164, 94, 0.25);
        border-color: #f2cd8f;
    }

    .SumoSelect:hover>.CaptionCont {
        box-shadow: none;
        border-color: #ced4da;
    }

</style>
@endsection


@section('content')
    @livewire('admin.guest-list')
@endsection


