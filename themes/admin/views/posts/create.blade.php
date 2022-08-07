@extends('layouts.app')

@section('title', 'Create Posts')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/jquery-nice-select/nice-select.css') }}">
@endsection

@section('content')
<section class="py-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">Create Post</h5>
        <a href="{{ route('admin.posts') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>

    {{-- form --}}
    <div class="card">
        <div class="card-header">
            <h3 class="h6 mb-0">Create Post</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('admin.posts.store') }}">
                @csrf
                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="room name">Post Title: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">
                        <input type="text" class="form-control bg-white" name="title" id="roomno" placeholder="Post Title" value="{{ old('title') }}">
                        @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="post body">Post content: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">
                        <textarea type="text" class="form-control bg-white" name="body" id="editor" placeholder="Type here..." >
                        {{ old('body') }}
                        </textarea>
                        @error('body')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="roomtype_id">Post image: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">


                        <input type="file" class="form-control bg-white" name="image" id="roomno" value="{{ old('image') }}">


                        @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mt-5">
                    <div class="col-md-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>


@endsection

