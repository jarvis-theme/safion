                <div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            @if(count(category_menu()) > 0)
                            <div id="categories" class="block">
                            	<ul class="block-content">
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
                                                @if($submenu->anak->count() != 0)
                                                <ul style="padding: 0px 20px;">
                                                    @foreach($side_menu->anak as $submenu2)
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
                            @if(count(best_seller()) > 0)
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
                            @endif
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
                            <div class="product-list">
                                <div class="top-list">
                                    <div class="col-xs-12 col-lg-6 col-sm-6">
                                        <h2 class="title">Produk Kami</h2>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 col-sm-6">
                                        <!-- <ul class="btn-thumb">
                                            <li>Sort by :</li>
                                            <li><a class="btn-grid" href="#" title="View Grid">View Grid</a></li>
                                            <li><a class="btn-list" href="#" title="View List">View List</a></li>
                                        </ul> -->
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                @if($jumlahCari != 0)
                                <div class="row">
                                    <ul class="grid">
                                        @foreach($hasilpro as $produks)
                                        <li class="col-xs-6 col-sm-4">
                                            <div class="image-container">
                                                {{HTML::image(product_image_url($produks->gambar1),'produk',array('class'=>'img-responsive'))}}
                                            </div>
                                            <h5 class="product-name">{{short_description($produks->nama, 25)}}</h5>
                                            <span class="price">{{price($produks->hargaJual)}}</span>
                                            <a class="view" href="{{product_url($produks)}}">Lihat</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            	{{--$produk->links()--}}
                                @else
                                <article class="text-center">
                                    <i>Hasil pencarian tidak ditemukan</i>
                                </article>
                                @endif
                            </div>
                        </div> <!--.center_column-->
                    </div><!--.inner-column-->	
                    <div>
                        @foreach(horizontal_banner() as $banner)    
                        <a href="{{url($banner->url)}}">
                            {{HTML::image(banner_image_url($banner->gambar), 'banner', array('width'=>'1168', 'height'=>'200', "class"=>"img-responsive"))}}
                        </a>
                        @endforeach 
                    </div>
                </div>