@extends('layouts.app')

@section('title', 'Add Rooms')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/jquery-nice-select/nice-select.css') }}">
@endsection

@section('content')
<section class="py-5">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">New Room</h5>
        <a href="{{ route('admin.room') }}" class="btn btn-primary float-right rounded"><i class="fas fa-angle-left fa-sm mr-2 text-gray-100"></i> Back</a>
        <div class="clearfix"></div>
    </div>

    {{-- form --}}
    <div class="card">
        <div class="card-header">
            <h3 class="h6 mb-0">Generate Room</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('admin.room.store') }}">
                @csrf
                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="room name">Room Name: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">
                        <input type="text" class="form-control bg-white" name="name" id="roomno" placeholder="Room Name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

				 <div class="form-group row mb-4">
				     <label class="col-md-3 col-form-label" for="room name">Room No: <sup class="text-danger">*</sup></label>

				     <div class="col-md-9">
				         <input type="text" class="form-control bg-white" name="room_no" id="roomno" placeholder="Room No" value="{{ old('room_no') }}">
				         @error('room_no')
				         <span class="text-red-500">{{ $message }}</span>
				         @enderror
				     </div>
				 </div>


                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="room price">Room price: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">
                        <input type="number" class="form-control bg-white" name="price" id="roomno" placeholder="Room Price"   value="{{ old('price') }}">
                        @error('price')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="room description">Description: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">
                        <textarea type="text" class="form-control bg-white" name="description" id="editor" placeholder="Type here..."   value="{{ old('description') }}">
						{{ old('description') }}
						</textarea>
                        @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="roomtype_id">Room status: <sup class="text-danger">*</sup></label>

                    <div class="col-md-9">

                        <select class="form-control nice-select wide" id="roomtype_id" name="status">
                            <option value="">Select Room Status</option>
                            <option value="avaliable">Avaliable</option>
                            <option value="unavaliable">Unavaliable</option>
                        </select>

						@error('status')
							<span class="text-red-500">{{ $message }}</span>
						@enderror
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-md-3 col-form-label" for="roomno">No of Person: <sup class="text-danger">*</sup></label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="no_of_people" id="to" value="{{ old('to', 1) }}" min="1" max="10">
                      @error('no_of_people')


                      <div class="error-message text-danger pl-1 mt-1">
                          <small>{{ $message }}</small>
                      </div>
                      @enderror

					</div>
                    <label class="col-md-2 col-form-label" for="to">No of Beds: <sup class="text-danger">*</sup></label>
                    <div class="col-md-3">

                        <div class="input-group">
                            <input type="number" class="form-control" name="no_of_bed" id="to" value="{{ old('to', 1) }}" min="1" max="10">
                            <div class="input-group-append">
                                <span class="input-group-text">Beds</span>
                            </div>
                        </div>

                        @error('no_of_bed')

                        <div class="error-message text-danger pl-1 mt-1">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror

                    </div>
                </div>

				  <div class="form-group row mb-4">
				      <label class="col-md-3 col-form-label" for="roomtype_id">Room picture: <sup class="text-danger">*</sup></label>

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
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>


@endsection

