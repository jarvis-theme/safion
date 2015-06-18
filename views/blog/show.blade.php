				<div class="container">
                	<div class="inner-column row">
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
                            <div id="latest-news" class="block">
	                        	<div class="title"><h2>Artikel Terbaru</h2></div>
	                        	<ul class="block-content">
	                        		@foreach(recentBlog(null,5) as $artikel)
	                                <li>
	                                    <h5 class="title-news" style="margin-bottom: 5px;"><a href="{{blog_url($artikel)}}">{{short_description($artikel->judul, 28)}}</a></h5>
	                                    <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
	                                </li>
	                                @endforeach
	                            </ul>
	                        </div>
                            <div id="latest-news" class="block">
                            	<div class="title"><h2>Kategori</h2></div>
	                        	<ul class="block-content">
                            		@foreach(list_blog_category() as $kat)
                            		<span style="text-decoration: underline;"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
                                    @endforeach	
                                </ul>
                            </div>
                            <div id="advertising" class="block">
                            @foreach(vertical_banner() as $banner)
                            	<div class="img-block">
                            		<a href="{{url($banner->url)}}">
                            			{{HTML::image(banner_image_url($banner->gambar),'banner',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                        			</a>
                                </div>
                            @endforeach
                            </div>
                        </div><!--#left_sidebar-->
                        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
                            <div class="product-list">
                                <section class="content">
                                    <div class="entry">
                                        <h1 class="title">{{$detailblog->judul}}</h1>
                                        <ul style="margin-bottom: 5px;">
                                            <span class="date-post"><i class="fa fa-calendar"></i> {{waktuTgl($detailblog->created_at)}}</span>&nbsp;&nbsp;
                                            @if(!empty($detailblog->kategori->nama))
                                            <span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$detailblog->kategori)}}">{{@$detailblog->kategori->nama}}</a></span>
                                            @endif
                                        </ul>
                                        {{sosialShare(blog_url($detailblog))}}
                                        <p>{{$detailblog->isi}}</p>
                                    </div><!--entry-->
                                    <hr>
                                    <div class="navigate comments clearfix">
                                    @if(isset($prev))
                                        <div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
                                    @else
                                        <div class="pull-right"></div>
                                    @endif

                                    @if(isset($next))
                                        <div class="pull-right">
                                            <a style="float: right;" href="{{$next->slug}}">Selanjutnya &rarr;</a>
                                        </div>
                                    @else
                                        <div class="pull-right"></div>
                                    @endif
                                    </div>
                                    <hr>
                                    <div>
                                        {{$fbscript}}
                                        {{fbcommentbox(slugBlog($detailblog), '100%', '5', 'light')}}
                                    </div>
                                </section>
                            </div>
                        </div> <!--.center_column-->
                    </div><!--.inner-column-->
                </div>