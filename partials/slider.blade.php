<section id="p-slide">
    <div class="container">
        <div id="da-slider" class="flexslider">
            <ul class="slides">
            @foreach(slideshow() as $slide)
                <li>
                    {{HTML::image(slide_image_url($slide->gambar), 'slideshow banner', array('width'=>'1366','height'=>'663'))}}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</section>