
@section('title', 'Edit About us Page')

@section('content')
    
    <div class="mt-12">
        <div class="mb-4">
            <h5 class="title-heading d-inline-block float-left">Edit About us</h5>
            <a href="{{ route('admin.about-us') }}"  class="btn btn-primary float-right rounded"><i class="fas fa-edit fa-sm mr-2 text-gray-100"></i>Back</a>
            <div class="clearfix"></div>
        </div>

          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 bg-white border-b border-gray-200">
                          <form enctype="multipart/form-data" method="POST" action="{{ route('admin.about.store') }}">
                              @csrf
                             

                              <div class="mb-4">
                                  <label class="text-xl text-gray-600">Cover image</label></br>
                            <div class="flex items-center justify-between">
                                <div>
                                  <input type="file" name="image" class="border-2 border-gray-300 p-2 w-full" id="description" required></input>
                                  @error('image')
                                      <span class="text-red-500">{{ $message }}</span>
                                  @enderror
                                
                                </div>

                                <div>
                                    <img src="{{ $about->image }}" class="w-72 object-center object-contain" />
                                </div>
                            </div>
                              </div>

                              <div class="mb-8">
                                  <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                  <textarea id="editor" name="content" class="border-2 border-gray-500">
                                    {{ old('content', $about->content) }}
                            </textarea>
                              @error('content')
                              <span class="text-red-500">{{ $message }}</span>
                              @enderror

                              </div>

                              <div class="flex p-1">

                                  <button role="submit" class="p-3 btn-primary text-white hover:bg-yellow-400 rounded " required>Submit</button>

                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>


    </div>


@endsection
