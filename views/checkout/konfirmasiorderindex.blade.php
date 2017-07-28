<div class="container">
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            @if(vertical_banner()->count() > 0)
            <div id="advertising" class="block">
                @foreach(vertical_banner() as $banner)
                <div class="img-block">
                    <a href="{{url($banner->url)}}">
                        {{HTML::image(banner_image_url($banner->gambar),'Info Promo',array('class'=>'img-responsive'))}}
                    </a>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div id="center_column" class="col-lg-4 col-xs-12 col-sm-8">
            <div class="contact-us">
                <h2 class="title">Konfirmasi Order</h2>
                {{Form::open(array('url'=>'konfirmasiorder','method'=>'post'))}}
                    <div class="input-group">
                        <input class="form-control" placeholder="Kode Order" type="text" name="kodeorder" required>
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button">Cari Kode</button>
                        </span>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>