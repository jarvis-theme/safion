<section id="breadcrumb">
    <div class="container">
        Home {{$breadcrumb}}
    </div>
</section>
<div class="container" id="main-layout">
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            @if(count(list_category()) > 0)
            <div id="categories" class="block">
            	<ul class="block-content">
                @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <li>
                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}<!-- <span class="arrow-right"></span> --></a>
                        @if($side_menu->anak->count() != 0)
                        <ul style="padding: 0px 20px;">
                            @foreach(list_category() as $submenu)
                            @if($submenu->parent == $side_menu->id)
                            <li>
                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                @if($submenu->anak->count() != 0)
                                <ul style="padding: 0px 20px;">
                                    @foreach($submenu->anak as $submenu2)
                                    @if($submenu2->parent == $submenu->id)
                                    <li>
                                        <a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                @endif
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
            @endif
            <div id="best-seller" class="block">
            	<div class="title"><h2>Produk Terlaris</h2></div>
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
            </div>
            <div id="latest-news" class="block">
            	<div class="title"><h2>Artikel Terbaru</h2></div>
            	<ul class="block-content">
                    @foreach(list_blog(2) as $blogs)
                    <li>
                        <h5 class="title-news">{{$blogs->judul}}</h5>
                        <p>{{short_description($blogs->isi, 150)}}<a class="read-more" href="{{blog_url($blogs)}}">Read More</a></p>
                        <span class="date-post">{{date("F d, Y", strtotime($blogs->created_at))}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div><!--#left_sidebar-->
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            @if( count(list_product(null, @$category)) > 0)
            <div class="product-list">
                <div class="row">
                    <ul class="grid">
                        @foreach(list_product(null, @$category) as $myproduk)
                        <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="prod-container">
                                 <div class="image-container">
                                    <a href="{{product_url($myproduk)}}">
                                        {{HTML::image(product_image_url($myproduk->gambar1), 'produk', array('class'=>'img-responsive','style'=>'height:200px;width:auto;'))}}
                                    </a>
                                    @if(is_outstok($myproduk))
                                    <div class="icon-info icon-sold">Kosong</div>
                                    @else
                                        @if(is_terlaris($myproduk))
                                        <div class="icon-info icon-sale">Hot</div>
                                        @elseif(is_produkbaru($myproduk))
                                        <div class="icon-info icon-new">Baru</div>
                                        @endif
                                    @endif
                                </div>
                                <h5 class="product-name">{{shortName($myproduk->nama,20)}}</h5>
                                <span class="price">{{price($myproduk->hargaJual)}}</span>
                                <a href="{{product_url($myproduk)}}" class="buy-btn">Lihat</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div><!--.row-->
            </div><!--.product_list-->
            <div class="clr"></div>
            <div class="pagination">
                {{list_product(null, @$category)->links()}}
            </div>
            @else
            <article style="font-style:italic; text-align:center;">
                Produk tidak ditemukan.
            </article>
            @endif
        </div> <!--.center_column-->
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