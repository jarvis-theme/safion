<section id="p-slide">
    <div class="container">
        <div id="da-slider" class="flexslider">
            <ul class="slides">
                @foreach(slideshow() as $slide)
                <li>
                    @if($slide->url=='')
                    <a href="#">
                    @else
                    <a href="{{filter_link_url($slide->url)}}" target="_blank">
                    @endif
                        {{HTML::image(slide_image_url($slide->gambar), $slide->title, array('class'=>'img-responsive'))}} 
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>