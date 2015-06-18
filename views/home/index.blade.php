<div class="container">
    <section id="main-content">
        <div class="container">
            <div class="inner-column row">
                <div id="center_column" class="col-lg-12 col-xs-12">
                    <div id="adv-home">
                        <ul class="row">
                            @foreach(horizontal_banner() as $banner)    
                            <li class="item col-xs-12 col-sm-12">
                                <a href="{{url($banner->url)}}">
                                    {{HTML::image(banner_image_url($banner->gambar), 'banner', array('width'=>'1168', 'height'=>'200', "class"=>"img-responsive"))}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="new-arrival">
                        <h2>Produk Kami</h2>
                        <ul class="menu-new">
                            <li><a href="#produk">Produk</a></li>
                            <li><a href="#new">Baru</a></li>
                            <li><a href="#best-seller">Terlaris</a></li>
                        </ul>
                        <div class="product-list">
                            <div class="row">
                                <div id="produk" class="new-content">
                                    <ul class="grid">
                                        @foreach(home_product() as $produk)
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                            <div class="prod-container">
                                                <div class="image-container">
                                                    <a href="{{product_url($produk)}}">
                                                        {{HTML::image(product_image_url($produk->gambar1), 'produk', array('class'=>'img-responsive','style'=>'height:250px;width:auto;'))}}
                                                    </a>
                                                    @if(is_outstok($produk))
                                                    <div class="icon-info icon-sold">Kosong</div>
                                                    @else
                                                        @if(is_terlaris($produk))
                                                        <div class="icon-info icon-sale">Hot</div>
                                                        @elseif(is_produkbaru($produk))
                                                        <div class="icon-info icon-new">Baru</div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <h5 class="product-name">{{shortName($produk->nama,25)}}</h5>
                                                <span class="price">{{price($produk->hargaJual)}}</span>
                                                <a href="{{product_url($produk)}}" class="buy-btn">Lihat</a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="clr"></div>
                                    <a class="view-all" href="{{url('produk')}}">View All</a>
                                </div><!--.man-content-->

                                <div id="new" class="new-content">
                                    <ul class="grid">
                                        @foreach(new_product() as $produk)
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                            <div class="prod-container">
                                                <div class="image-container">
                                                    <a href="{{product_url($produk)}}">
                                                        {{HTML::image(product_image_url($produk->gambar1), 'produk', array('class'=>'img-responsive','style'=>'height:250px;width:auto;'))}}
                                                    </a>
                                                    @if(is_outstok($produk))
                                                    <div class="icon-info icon-sold">Kosong</div>
                                                    @else
                                                        @if(is_terlaris($produk))
                                                        <div class="icon-info icon-sale">Hot</div>
                                                        @elseif(is_produkbaru($produk))
                                                        <div class="icon-info icon-new">Baru</div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <h5 class="product-name">{{shortName($produk->nama,25)}}</h5>
                                                <span class="price">{{price($produk->hargaJual)}}</span>
                                                <a href="{{product_url($produk)}}" class="buy-btn">Lihat</a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="clr"></div>
                                    <a class="view-all" href="{{url('produk')}}">View All</a>
                                </div><!--.man-content-->

                                <div id="best-seller" class="new-content">
                                    <ul class="grid">
                                        @foreach(best_seller() as $produk)
                                        <li class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                            <div class="prod-container">
                                                <div class="image-container">
                                                    <a href="{{product_url($produk)}}">
                                                        {{HTML::image(product_image_url($produk->gambar1), 'produk', array('class'=>'img-responsive','style'=>'height:250px;width:auto;'))}}
                                                    </a>
                                                    @if(is_outstok($produk))
                                                    <div class="icon-info icon-sold">Kosong</div>
                                                    @else
                                                        @if(is_terlaris($produk))
                                                        <div class="icon-info icon-sale">Hot</div>
                                                        @elseif(is_produkbaru($produk))
                                                        <div class="icon-info icon-new">Baru</div>
                                                        @endif
                                                    @endif
                                                </div>
                                                <h5 class="product-name">{{shortName($produk->nama,25)}}</h5>
                                                <span class="price">{{price($produk->hargaJual)}}</span>
                                                <a href="{{product_url($produk)}}" class="buy-btn">Lihat</a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="clr"></div>
                                    <a class="view-all" href="{{url('produk')}}">View All</a>
                                </div><!--.women-content-->
                            </div><!--.row-->
                        </div><!--.product_list-->
                        <div class="clr"></div>
                    </div><!--#new-arrival-->
                    
                    <div id="brand-carousel">
                        <div id="brand-slide" class="owl-carousel owl-theme">
                            @foreach(list_koleksi() as $koleksi)
                            <div class="item">
                                <a href="{{koleksi_url($koleksi)}}">
                                    <img class="img-responsive" src="{{url(koleksi_image_url($koleksi->gambar,'medium'))}}" alt="brand" width="204" height="86" />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div> <!--.p-carousel-->
                </div> <!--.center_column-->
            </div><!--.row-->
        </div>
    </section>
</div>