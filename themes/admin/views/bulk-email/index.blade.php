@extends('layouts.app')

@section('title', 'Bulk email')

@section('content')
    <section class="py-5">
     <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">Send Bulk Email</h5>
        <div class="clearfix"></div>
    </div>
     <div class="container mx-auto sm:w-100 bg-gray-100 p-4 shadow-2xl">
  <form method="POST" action="{{ route('admin.bulk-email.store') }}">
    @csrf
              <div class="mb-6">
                <label for="name" class="block">
                    <span class="text-gray-700">
                        Subject
                    </span>
                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject"  id="" class="@error('subject')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('subject')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block">
                    <span class="text-gray-700">
                        Message
                    </span>
                    <textarea rows="3" id="editor" name="message" placeholder="Type here..."  id="" class="@error('message')border border-red-500 @enderror form-textarea mt-1 block w-full">
                        {{ old('message') }}
                    </textarea>
                </label>
                @error('message')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="mt-2 w-full sm:w-1/6 rounded-full text-white roundedshadow bg-gray-800 hover:bg-gray-500 outlined-none py-2 px-4">
                Send
            </button>
        </form>

        </div>

    </section>

@endsection