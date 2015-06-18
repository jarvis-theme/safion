<header>
    <div id="top-head">
        <div class="container">
            <div class="top-tel fl">
                <i class="fa fa-phone"></i> <a style="color:#fff;" href="tel:{{$kontak->telepon}}">Call : {{@$kontak->telepon ? $kontak->telepon.'&nbsp;&nbsp;' : '-&nbsp;&nbsp;'}}</a>
            </div>
            <div class="top-links fr">
                <ul>
                @if( !is_login() )
                    <li><a href="{{url('member')}}"><i class="fa fa-user"></i> Log in</a></li>
                @else
                    <li><a href="{{url('member')}}"><i class="fa fa-user"></i> {{shortName(user()->nama, 50)}}</a></li>
                    <li>{{HTML::link('logout', 'Logout')}}</li>
                @endif
                    <li class="shopping-cart" id="shoppingcartplace">
                        <a href="{{url('checkout')}}">{{shopping_cart()}}</a>
                    </li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div> <!--.top-head-->
    
    <div class="container">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-12 col-lg-4">
            @if(@getimagesize( url(logo_image_url()) ))
                <a href="{{url('home')}}">
                    {{HTML::image(logo_image_url(),'logo')}}
                </a>
            @else
                <h3>
                    <strong>
                        <a href="{{url('home')}}">{{shortName(Theme::place('title'),16)}}</a>
                    </strong>
                </h3>
            @endif
            </div>
            <!-- NAV -->
            <nav id="menu" class="navbar navbar-default col-xs-12 col-sm-12 col-lg-8" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand mobile-only" href="#">MENU</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                         @foreach(list_category() as $key=>$menu)

                            @if($menu->parent=='0')
                            <li class="dropdown">
                                @if(count($menu->anak) < 1)
                                <a href="{{category_url($menu)}}">
                                    {{$menu->nama}}
                                </a>
                                @else
                                <a href="{{category_url($menu)}}" class="dropdown-toggle" data-toggle="dropdown">
                                    {{$menu->nama}} <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->anak as $key => $submenu)
                                        <li><a href="{{category_url($submenu)}}">{{$submenu->nama}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif

                        @endforeach                    
                    </ul>       
                </div>
            </nav> <!-- .nav - END -->
            <div class="clr"></div>
        </div>
    </div>
</header>