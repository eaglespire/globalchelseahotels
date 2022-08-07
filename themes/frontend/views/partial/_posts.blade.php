 <div class="blog mb-20">
     <div class="booking_title text-center mt-2">
         <h2 class="h1">News</h2>
     </div>
     <div class="blog_slider_container">
         <div class="owl-carousel owl-theme blog_slider">

            @foreach($posts as $post)
                <div class="blog_slide">
                    <div class="background_image" style="background-image:url({!! $post->image !!})"></div>
                    <div class="blog_content">
                        <div class="blog_date"><a href="{{ route('posts.show', $post->id) }}">{{ $post->created_at }} </a></div>

                        <div class="blog_title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></div>

                    </div>
                </div>
            @endforeach
         </div>
     </div>
 </div>
