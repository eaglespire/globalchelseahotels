@extends('layouts.app')

@section('title', 'Sending Message')

@section('content')
    <section class="py-5">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Reply {{ $inbox->name }} Message</h5>
            <a href="{{ route('admin.inbox') }}" class="btn btn-primary float-right rounded" ><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
            <div class="clearfix"></div>
        </div>
          <div class="container mx-auto sm:w-100 bg-gray-100 p-4 shadow-2xl">
  <form method="POST" action="{{ route('admin.inbox.store') }}">
    @csrf
     <div class="mb-6">
                <label for="name" class="block">
                    <span class="text-gray-700">
                        Name
                    </span>
                <input type="text" name="name" value="{{ old('name', $inbox->name) }}"  placeholder="Name"  id="" class="@error('name')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('name')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div class="mb-6">
                <label for="email" class="block">
                    <span class="text-gray-700">
                        Email
                    </span>
                <input type="email" name="email" value="{{ old('email', $inbox->email) }}"  placeholder="Email"  id="" class="@error('email')border border-red-500 @enderror form-input mt-1 block w-full">
                </label>
                @error('email')
                     <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
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