<div class="blog">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="blog_posts">

                    @forelse($posts as $post)

                        <div class="blog_post">
                            <div class="blog_post_image">
                                <img src="{{ $post->image }}" alt="">
                                <div class="blog_post_date"><a href="#">{{ $post->created_at }}</a></div>
                            </div>
                            <div class="blog_post_content">
                                <div class="blog_post_title"><a href="#">{{ $post->title }}</a></div>

                                <div class="blog_post_text">
                                    <p>
                                        {!! $post->body !!}
                                    </p>
                                </div>
                                <div class="button blog_post_button"><a href="#">Read More</a></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-2xl">
                            NO POST FOUND
                        </p>
                    @endforelse

                    <div class="page_nav">
                        {{-- {{ $posts->links() }} --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar">

                    <div class="sidebar_search">
                        <form action="#" class="sidebar_search_form" id="sidebar_saerch_form">
                            <input type="text" class="sidebar_search_input" placeholder="Keyword" required>
                            <button class="sidebar_search_button">Search</button>
                        </form>
                    </div>

                    <div class="recent_posts">
                        <div class="sidebar_title">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="sidebar_list">
                            <ul>
                                <li><a href="#">Featured Product</a></li>
                                <li><a href="#">Standard Post</a></li>
                                <li><a href="#">Gallery Post</a></li>
                                <li><a href="#">Video Post</a></li>
                                <li><a href="#">Audio Post</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="categories">
                        <div class="sidebar_title">
                            <h4>Categories</h4>
                        </div>
                        <div class="sidebar_list">
                            <ul>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Hotel</a></li>
                                <li><a href="#">Vacation</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tags">
                        <div class="sidebar_title">
                            <h4>Tags</h4>
                        </div>
                        <div class="tags_container">
                            <ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
                                <li><a href="#">news</a></li>
                                <li><a href="#">hotel</a></li>
                                <li><a href="#">vacation</a></li>
                                <li><a href="#">reservation</a></li>
                                <li><a href="#">booking</a></li>
                                <li><a href="#">video</a></li>
                                <li><a href="#">clients</a></li>
                                <li><a href="#">reviews</a></li>
                                <li><a href="#">destinations</a></li>
                                <li><a href="#">swimming pool</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="special_offer">
                        <div class="background_image" style="background-image:url(images/special_offer.jpg)"></div>
                        <div class="special_offer_container text-center">
                            <div class="special_offer_title">Special Offer</div>
                            <div class="special_offer_subtitle">Family Room</div>
                            <div class="button special_offer_button"><a href="#">Book now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
