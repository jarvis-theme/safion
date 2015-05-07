            <footer>
                <div class="top-footer">
                    <div class="container">
                        <div class="row">
                            <div id="newsletter" class="col-xs-12 col-sm-12 col-lg-6">
                                <h4 class="title">Newsletter</h4>
                                <div class="block-content">
                                    <p>Jadilah orang pertama yang mendapatkan info produk terbaru, dan promo dari kami. <br>Daftarkan email anda dan dapatkan segera promo menarik.</p>
                                    <form class="newsletter-form" action="{{@$mailing->action}}" method="post" target="_blank" novalidate>
                                        <input type="text" value="" {{ @$mailing->action==''?'disabled="disabled"':'' }} placeholder="Enter your email" name="EMAIL" class="input-medium required email" id="newsletter mce-EMAIL"/>
                                        <div class="fr">
                                            <button type="submit" {{ @$mailing->action==''?'disabled="disabled"':'' }}>SUBSCRIBE</button>
                                        </div>
                                        <div class="clr"></div>
                                    </form>
                                </div>
                            </div><!--#newsletter-->
                            @foreach($tautan as $key=>$group)
                                <div id="links-foot" class="col-xs-12 col-sm-4 col-lg-2">
                                    <h4 class="title">{{$group->nama}}</h4>
                                    <div class="block-content">
                                        <ul>
                                            @foreach($quickLink as $key=>$link)
                                                @if($group->id==$link->tautanId)
                                                <li>
                                                    @if($link->halaman=='1')
                                                        @if($link->linkTo == 'halaman/about-us')
                                                        <a href="{{url(strtolower($link->linkTo))}}">{{$link->nama}}</a>
                                                        @else
                                                        <a href='{{url("halaman/".strtolower($link->linkTo))}}'>{{$link->nama}}</a>
                                                        @endif
                                                    @elseif($link->halaman=='2')
                                                        <a href='{{url("blog/".strtolower($link->linkTo))}}'>{{$link->nama}}</a>
                                                    @elseif($link->url=='1')
                                                        <a href="http://{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
                                                    @else
                                                        <a href='{{url(strtolower($link->linkTo))}}'>{{$link->nama}}</a>
                                                    @endif
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p>&copy; {{ short_description(Theme::place('title'),80) }} {{date('Y')}} All Right Reserved. Powered by <a style="text-decoration: none;" target="_blank" href="http://jarvis-store.com"> Jarvis Store</a></p>
                    </div>
                </div>
            </footer>