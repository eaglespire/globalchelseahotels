<div class="gallery-area fix">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="gallery-active owl-carousel">
                    @foreach($galleries as $gallery)
                        <div class="gallery-img">
                            <a href="#"><img src="{{ $gallery->image }}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
