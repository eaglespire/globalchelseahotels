   <div class="testimonials">
       <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/testimonial.jpg" data-speed="0.8"></div>
       <div class="testimonials_overlay"></div>
       <div class="container">
           <div class="row">
               <div class="col">
                   <h1 class="text-center h1 text-white font-weight-bolder">Testimonials</h1>
                   <div class="testimonials_slider_container">
                       <div class="owl-carousel owl-theme test_slider">

                            @foreach($testimonials as $testimonial)
                                <div class="test_slider_item text-center">
                                    {{-- <div class="rating rating_5 d-flex flex-row align-items-start justify-content-center">
                                        <i></i><i></i><i></i><i></i><i></i></div> --}}
                                    {{-- <div class="testimonial_title"><a href="#">Perfect Stay</a></div> --}}
{{--                                    <div class="testimonial_image">--}}
{{--                                        <img src="{{ $testimonial->profile_pic }}" alt="">--}}
{{--                                    </div>--}}
                                    <div class="testimonial_text">
                                        <p>
                                           {!! $testimonial->reviews !!}

                                        </p>
                                    </div>
                                    <div class="testimonial_author">
                                        <a href="#"> {{ $testimonial->name }} </a>, Customer
                                    </div>
                                </div>

                            @endforeach


                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
