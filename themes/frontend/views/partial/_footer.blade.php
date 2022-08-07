<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-item">
                    <div class="footer-logo">
                        <a href="#">
                            <img src="/images/logo.png" alt="">
                        </a>
                    </div>
                    <p class="text-white">
                        We offer a conducive environment for short-term, long-term lodging and accommodation in Benin City.
                        We provide a fantastic location and convenient amenities so that you can get comfortable at our hotel
                        fast.
                        Guests enjoy all-day room services and more.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer-item">
                    <h5>Get News Updates </h5>
                    <p class="text-white"> Subscribe for offers and Resources </p>
                    <form action="{{ route('newsletter.store') }}" method="POST">
                        @csrf
                        <div class="newslatter-form">
                            <input type="email" name="email" placeholder="Your Email Here" required>
                            <button type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-item">
                    <h5>Contact Info</h5>
                    <ul>
                        <li>
                            <img src="/img/placeholder.png" alt=""> 20 Osayogie street off Benin Lagos express road, Idumwowina Quarter Benin City <br />
                        </li>
                        <li><img src="/img/phone-2.png" alt=""> +234 803-218-7719 </li>
                        <li><img src="/img/ple.png" alt=""> Info@globalchelseahotel.com </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="{{ route('about') }}">About </a></li>
                        <li><a href="{{ route('rooms') }}">Rooms </a></li>
                        <li><a href="{{ route('services') }}">Services </a></li>
                        <li><a href="{{ route('posts') }}">Blog </a></li>
                        <li><a href="{{ route('contact') }}">Contact </a></li>
                    </ul>
                </div>
                <div class="col-md-5 ">
                    <div class="small text-white text-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());

                        </script>
                        All rights reserved |
                        Powered by
                        <a href="https://brykiva.com" target="_blank">Brykiva Solutions</a>
                    </div>
                </div>
            </div>
            <div class="row ">
            </div>
        </div>
    </div>
</footer>
