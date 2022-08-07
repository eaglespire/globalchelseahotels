
<div class="container-fluid">
    <div class="row" x-data="buildGallery()">
        <template x-for="item in items">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="transition_gallery_container">
                    <figure>
                        <img :src="item.image" class="img-thumbnail grayscale zoom_gallery">
                        <figcaption x-text="item.title"></figcaption>
                    </figure>
                </div>
            </div>
        </template>
    </div>
</div>
