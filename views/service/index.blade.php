                <div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            <div id="latest-news" class="block">
                            	<div class="title"><h2>Artikel Terbaru</h2></div>
                            	<ul class="block-content">
                                    @foreach(list_blog(2) as $artikel)
                                    <li>
                                        <h5 class="title-news" style="margin-bottom: 5px;">{{short_description($artikel->judul, 28)}}</h5>
                                        <p>{{short_description($artikel->isi, 150)}} <a class="read-more" href="{{blog_url($artikel)}}">Read More</a></p>
                                        <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="advertising" class="block">
                                @foreach(vertical_banner() as $banners)
                            	<div class="img-block">
                            		<a href="{{URL::to($banners->url)}}">
                                        {{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div><!--#left_sidebar-->
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list">
                            	<div class="entry">
                                    <h2 class="title">Customer Service</h2>
                                </div>
                            	<div class="row">
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                    	<h3>Term of Service</h3>
                                    	<p>{{$service->tos}}</p>
                                    </article>
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                    	<h3>Refund Policy</h3>
                                    	<p>{{$service->refund}}</p>
                                    </article>
                                    <article class="col-lg-12 col-md-12 col-xs-12">
                                    	<h3>Privacy Policy</h3>
                                    	<p>{{$service->privacy}}</p>
                                    </article>
                                </div>
                            </div>
                        </div> <!--.center_column-->
                    </div><!--.inner-column-->
                </div>