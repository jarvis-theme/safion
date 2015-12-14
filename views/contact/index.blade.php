<section id="breadcrumb">
    <div class="container">
        <p>Kontak</p>
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
            <div id="latest-news" class="block">
                <div class="title"><h2>Artikel Terbaru</h2></div>
                <ul class="block-content">
                    @foreach(list_blog(2) as $artikel)
                    <li>
                        <h5 class="title-news" id="news">{{short_description($artikel->judul, 28)}}</h5>
                        <p>{{short_description($artikel->isi, 150)}} <a class="read-more" href="{{blog_url($artikel)}}">Selengkapnya</a></p>
                        <span class="date-post"><i class="fa fa-calendar"></i> {{date("d F Y", strtotime($artikel->created_at))}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div id="advertising" class="block">
                @foreach(vertical_banner() as $banners)
                <div class="img-block">
                    <a href="{{url($banners->url)}}">
                        {{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <div class="contact-us">
                <div class="maps">
                    @if($kontak->lat!='0' || $kontak->lng!='0')
                        <iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe><br />
                    @else
                        <iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq={{ $kontak->alamat }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
                    @endif
                </div>
                <div class="contact-desc">
                    <p><strong>Alamat :</strong> {{$kontak->alamat}}</p>
                    <span><i class="phone"></i> {{$kontak->telepon ? $kontak->telepon : ' - '}}</span>
                    <span><i class="bbm"></i> {{$kontak->bb ? $kontak->bb : '&nbsp;&nbsp;-&nbsp;'}}</span>
                    <span><i class="mail"></i> {{$kontak->email}}</span>
                    <div class="clr"></div>
                </div>
                <br><br>
                <form class="contact-form" action="{{url('kontak')}}" method="post">
                    <p class="form-group">
                        <input class="form-control" placeholder="Nama" name="namaKontak" type="text" required>
                    </p>
                    <p class="form-group">
                        <input class="form-control" placeholder="Email" name="emailKontak" type="text" required>
                    </p>
                    <p class="form-group">
                        <textarea class="form-control" placeholder="Pesan" name="messageKontak" required></textarea>
                    </p>
                    <button class="btn btn-info" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>