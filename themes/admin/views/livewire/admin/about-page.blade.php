@section('title', 'About us page')
@section('content')
<div class="mt-12">
    <div class="mb-4">
        <h5 class="title-heading d-inline-block float-left">About Us Section</h5>
        <a href="{{ route('admin.edit-about-us') }}" class="btn btn-primary float-right rounded"><i class="fas fa-edit fa-sm mr-2 text-gray-100"></i>Edit</a>
        <div class="clearfix"></div>
    </div>
 

  <div class="bg-white shadow-2xl rounded sm:flex justify-between">
    <div class="about-image">
        <img src="{{ $about->image }}" class="w-full  object-center object-contain object-cover" />
    </div>
    <div class="ml-10 pb-10">
    <p class="text-gray-600 dark:text-gray-400  mt-4 py-2">
        {!! $about->content !!}
    </p>

    </div>
  </div>

</div>
    
@endsection
