                <div class="container">
                    <div class="inner-column row">
                        <section id="breadcrumb">
                            <div class="container">
                                <p>Kontak</p>
                            </div>
                        </section>
                        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
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
                            <div class="contact-us">
                                <div class="maps">
                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56211042157!2d107.64315755!3d-6.90344945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sKota+Bandung%2C+Jawa+Bar.%2C+Indonesia!5e0!3m2!1sid!2s!4v1428468333376" width="600" height="400" frameborder="0" style="border:0"></iframe> -->
                                    @if($kontak->lat=='0' || $kontak->lat=='0')
                                        <iframe style="float:right;width:100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                                    @else
                                        <iframe style="float:right;width:100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                                    @endif
                                </div>
                                <div class="contact-desc">
                                    <p><strong>Shop Address :</strong> {{$kontak->alamat}}</p>
                                    <span><i class="phone"></i> {{$kontak->telepon ? $kontak->telepon : ' - '}}</span>
                                    <span><i class="bbm"></i> {{$kontak->bb ? $kontak->bb : '&nbsp;&nbsp;-&nbsp;'}}</span>
                                    <span><i class="mail"></i> {{$kontak->email}}</span>
                                    <div class="clr"></div>
                                </div>
                                <br><br>
                                <form class="contact-form">
                                    <p class="form-group">
                                        <input class="form-control" placeholder="Name" type="text">
                                    </p>
                                    <p class="form-group">
                                        <input class="form-control" placeholder="Email Address" type="text">
                                    </p>
                                    <p class="form-group">
                                        <input class="form-control" placeholder="Subject" type="text">
                                    </p>
                                    <p class="form-group">
                                        <textarea class="form-control" placeholder="Message"></textarea>
                                    </p>
                                    <button class="btn-send">Send</button>
                                </form>                                
                            </div>
                        </div> <!--.center_column-->
                    </div><!--.inner-column-->
                </div>