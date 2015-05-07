@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
  <p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif
@if($errors->all())
<div class="error" id='message' style='display:none'>
Terjadi kesalahan dalam menyimpan data.<br>
    <ul>
    @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
</div>
@endif
                <div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            <div id="categories" class="block sidey">
                            	<ul class="block-content nav">
                                @foreach(category_menu() as $side_menu)
                                    @if($side_menu->parent == '0')
                                    <li>
                                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}<!-- <span class="arrow-right"></span> --></a>
                                        @if($side_menu->anak->count() != 0)
                                        <ul style="padding: 0px 20px;">
                                            @foreach($side_menu->anak as $submenu)
                                            @if($submenu->parent == $side_menu->id)
                                            <li>
                                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            <div id="best-seller" class="block">
                            	<div class="title"><h2>Best Sellling</h2></div>
                            	<ul class="block-content">
                                    @foreach(best_seller() as $best)
                                    <li>
                                    	<a href="{{product_url($best)}}">
                                        	<div class="img-block">
                                                {{HTML::image(product_image_url($best->gambar1),'produk',array('width'=>'81','height'=>'64'))}}
                                            </div>
                                            <p class="product-name">{{$best->nama}}</p>
                                            <p class="price">{{price($best->hargaJual)}}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="btn-more">
                                	<a href="{{url('produk')}}">view more</a>
                                </div>
                            </div>
                            <div id="advertising" class="block">
                            @foreach(vertical_banner() as $banner)    
                                <div class="img-block">
                                    <a href="{{url($banner->url)}}">
                                        {{HTML::image(banner_image_url($banner->gambar), 'banner', array('width'=>'1168', 'height'=>'200', "class"=>"img-responsive"))}}
                                    </a>
                                </div>
                            @endforeach 
                            </div>
                        </div><!--#left_sidebar-->
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="contact-us">
                                <h2 class="title">Testimonial</h2>
                                <div class="contact-desc">
                                    @foreach(recentTestimonial() as $key=>$value)
                                    <article class="col-lg-12" style="margin-bottom:10px">
                                        <h4><strong>{{$value->nama}}</strong></h4>
                                        <blockquote>{{short_description($value->isi,400)}}</blockquote>
                                        <br><hr>
                                    </article>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    {{recentTestimonial()->links()}}
                                </div>
                                <form class="col-lg-12 col-xs-12 contact-form" action="{{url('testimoni')}}" method="post">
                                    <h3>Kirim Testimonial</h3>
                                    <p class="form-group">
                                        <input class="form-control" placeholder="Nama" name="nama" type="text" required>
                                    </p>
                                    <p class="form-group">
                                        <textarea class="form-control" placeholder="Pesan" name="testimonial" required></textarea>
                                    </p>
                                    <button class="btn-send" type="submit">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div><!--.inner-column-->	
                    <div>
                    @foreach(horizontal_banner() as $banner)    
                        <a href="{{url($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar), 'banner', array('width'=>'1168', 'height'=>'200', "class"=>"img-responsive"))}}
                        </a>
                    @endforeach 
                    </div>
                    <br>
                </div>