@extends('layouts.app')

@section('title', 'Add Testimonial')

@section('content')
    <section class="py-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">Create Testimonial</h5>
        <a href="{{ route('admin.testimonial') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>

    <form method="POST" action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data">
    @csrf
     <div class="mb-6">
                <label for="name" class="block">
                    <span class="text-gray-700">
                        Profile picture (optional)
                    </span>
                <input type="file" name="profile_pic" value="{{ old('name') }}" placeholder="Name"  id="" class="@error('name')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('profile_pic')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
              <div class="mb-6">
                <label for="name" class="block">
                    <span class="text-gray-700">
                        Name
                    </span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name"  id="" class="@error('name')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('name')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

             <div class="mb-6">
                <label for="name" class="block">
                    <span class="text-gray-700">
                        Email
                    </span>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"  id="" class="@error('email')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('email')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block">
                    <span class="text-gray-700">
                        Reviews
                    </span>
                    <textarea rows="3" id="editor" name="reviews" placeholder="Type here..."  id="" class="@error('reviews')border border-red-500 @enderror form-textarea mt-1 block w-full">
                        {{ old('reviews') }}
                    </textarea>
                </label>
                @error('reviews')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="is_approve" class="block">
                    <span class="text-gray-700">
                        Approve ?
                    </span>
                    Yes : <input type="radio" name="is_approve" value="1" class="form-checkbox m" />
                    No : <input type="radio" name="is_approve" value="0" class="form-checkbox" />
                </label>
            </div>
            
            <button type="submit" class="mt-2 w-full sm:w-1/6 rounded-full text-white roundedshadow bg-gray-800 hover:bg-gray-500 outlined-none py-2 px-4">
                Create
            </button>
        </form>
    </section>
@endsection