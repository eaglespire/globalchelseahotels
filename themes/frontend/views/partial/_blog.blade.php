<section class="home-blog bg-sand">
    <div class="container">
        <!-- section title -->
        <div class="row justify-content-md-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="section-title text-center title-ex1">
                    <h2>Latest News</h2>
                </div>
            </div>
        </div>
        <!-- section title ends -->
        <div class="row ">
            @foreach($posts as $post)
                <div class="col-md-6">
                <div class="media blog-media">
                    <a href="{{ route('posts.show',$post->id) }}"><img class="d-flex" src="{{ $post->image }}" alt="Generic placeholder image"></a>
                    <div class="circle">
                        <h5 class="day">{{ $post->created_at->format('d') }}</h5>
                        <span class="month">{{ $post->created_at->format('M') }}</span>
                    </div>
                    <div class="media-body">
                        <a href=""><h5 class="mt-0">{{ $post->title }}</h5></a>
                        {!! Str::limit($post->body,40) !!}
                        <a href="{{ route('posts.show',$post->id) }}" class="post-link">Read More</a>
                        <ul>
                            <li>by: Admin</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="section-title text-center title-ex1">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
