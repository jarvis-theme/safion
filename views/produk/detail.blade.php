<section id="breadcrumb">
    <div class="container">
        {{breadcrumbProduk($produk,'; <span>/</span> ',';',true)}}
    </div>
</section>
<div class="container" id="main-layout">
    <div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
            @if(count(list_category()) > 0)
            <div id="categories" class="block sidey">
            	<ul class="block-content nav">
                @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <li>
                        <a href="{{category_url($side_menu)}}">{{$side_menu->nama}}<!-- <span class="arrow-right"></span> --></a>
                        @if($side_menu->anak->count() != 0)
                        <ul class="sidenav">
                            @foreach($side_menu->anak as $submenu)
                            @if($submenu->parent == $side_menu->id)
                            <li>
                                <a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
                                @if($submenu->anak->count() != 0)
                                <ul class="sidenav">
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
                    @foreach(best_seller(4) as $best)
                    <li>
                    	<a href="{{product_url($best)}}">
                        	<div class="img-block">
                                {{HTML::image(product_image_url($best->gambar1,'thumb'), $best->nama,array('width'=>'81','height'=>'64'))}}
                            </div>
                            <p class="product-name">{{short_description($best->nama,35)}}</p>
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
                @foreach(vertical_banner() as $key => $banners)
                <div class="img-block">
            		<a href="{{url($banners->url)}}">
                        {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                    </a>
                </div><br>
                @endforeach
            </div>
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <form action="#" id="addorder">
            	<div class="product-details">
                	<div class="row">
                    	<div id="prod-left" class="col-lg-6 col-xs-12 col-sm-6">
                        	<div class="big-image">
                                {{HTML::image(product_image_url($produk->gambar1,'large'), $produk->nama,array('width'=>'419','height'=>'563'))}}
                                <a class="zoom fancybox" href="{{product_image_url($produk->gambar1,'large')}}" title="{{$produk->nama}}">&nbsp;</a>
                            </div>
                            <div id="thumb-view">
                            	<ul id="thumb-list" class="owl-carousel owl-theme">
                                    @if($produk->gambar1 != '')
                                    <li class="item">
                                        <a class="zoom fancybox" href="{{product_image_url($produk->gambar1,'large')}}" title="{{$produk->nama}}">
                                        {{HTML::image(product_image_url($produk->gambar1,'medium'),'gambar1',array('width'=>'130', 'height'=>'174'))}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($produk->gambar2 != '')
                                    <li class="item">
                                        <a class="zoom fancybox" href="{{product_image_url($produk->gambar2,'large')}}" title="{{$produk->nama}}">
                                        {{HTML::image(product_image_url($produk->gambar2,'medium'),'gambar2',array('width'=>'130', 'height'=>'174'))}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($produk->gambar3 != '')
                                    <li class="item">
                                        <a class="zoom fancybox" href="{{product_image_url($produk->gambar3,'large')}}" title="{{$produk->nama}}">
                                        {{HTML::image(product_image_url($produk->gambar3,'medium'),'gambar3',array('width'=>'130', 'height'=>'174'))}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($produk->gambar4 != '')
                                    <li class="item">
                                        <a class="zoom fancybox" href="{{product_image_url($produk->gambar4,'large')}}" title="{{$produk->nama}}">
                                        {{HTML::image(product_image_url($produk->gambar4,'medium'),'gambar4',array('width'=>'130', 'height'=>'174'))}}
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div id="prod-right" class="col-lg-6 col-xs-12 col-sm-6">
                        	<h2 class="name-title">{{$produk->nama}}</h2>
                            <span class="price">
                            @if($produk->hargaCoret != 0)
                            <s>{{price($produk->hargaCoret)}}</s>&nbsp;&nbsp;
                            @endif
                            {{price($produk->hargaJual)}}
                            </span>
                            <div class="img-rating">
                                {{sosialShare(product_url($produk))}}
                            </div>
                            <div class="desc-prod">
                            	<p class="title">Deskripsi Produk</p>
                                <p>{{$produk->deskripsi}}</p>
                                <div class="clr"></div>
                            </div>
                            <div class="avail-info">
                                @if($produk->stok > 0)
                            	<i class="instock" id="stock"></i><span>Tersedia, Stok {{$produk->stok}} item</span>
                                @else
                                <i class="fa fa-times" id="empty-stock"></i><span>Habis</span>
                                @endif
                            </div>
                            <div class="attribute">
                            	<fieldset class="attribute_fieldset">
                                	<div class="attribute_list">
                                        @if($opsiproduk->count() > 0)                 
                                        <div class="size-list">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Opsi :</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control attribute_select" name="opsiproduk">
                                                        <option value="">-- Pilih Opsi --</option>
                                                        @foreach ($opsiproduk as $key => $opsi)
                                                        <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                                                            {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{jadiRupiah($opsi->harga)}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="quantity">
                                        	<div class="form-group">
                                                <label class="col-sm-4 control-label">Quantity :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="qty" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="clr"></div>
                            <div class="btm-details">
                                <button class="btn addtocart" type="submit">Beli</button>
                                <div class="clr"></div>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </form>
            @if(count(other_product($produk)) > 0)
            <div id="related-product" class="product-list">
                <h2 class="title">Related Product</h2>
                <div class="row">
                    <ul class="grid">
                        @foreach(other_product($produk) as $produk_lain)
                         <li class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                           <div class="image-container">
                                <a href="{{product_url($produk_lain)}}">
                                    {{HTML::image(product_image_url($produk_lain->gambar1,'medium'), $produk_lain->nama, array('class'=>'img-responsive','style'=>'height:200px;width:auto;'))}}
                                </a>
                                @if(is_outstok($produk_lain))
                                <div class="icon-info icon-sold">Kosong</div>
                                @elseif(is_terlaris($produk_lain))
                                <div class="icon-info icon-sale">Hot</div>
                                @elseif(is_produkbaru($produk_lain))
                                <div class="icon-info icon-new">Baru</div>
                                @endif
                            </div>
                            <h5 class="product-name">{{$produk_lain->nama}}</h5>
                            <span class="price">{{price($produk_lain->hargaJual)}}</span>
                            <a href="{{product_url($produk)}}" class="buy-btn">Lihat</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
           
            <div class="row col-xs-12" id="comment-product">
                <hr>
                {{pluginTrustklik()}}
            </div>
        </div>
    </div>
</div>