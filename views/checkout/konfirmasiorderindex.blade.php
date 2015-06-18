@if(Session::has('message'))
<div class="error" id='message' style='display:none'>
	<p>Maaf, kode order anda tidak ditemukan.</p>					
</div>
@endif

<div class="container">
	<div class="inner-column row">
        <div id="left_sidebar" class="col-lg-3 col-xs-12 col-sm-4">
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
	        <div class="contact-us">
	            <h2 class="title">Konfirmasi Order</h2>
	            <div class="contact-desc">
                    {{Form::open(array('url'=>'konfirmasiorder','method'=>'post'))}}
                        <p class="form-group">
                        	<input class="form-control" placeholder="Kode Order" type="text" required>
                    	</p>
                        <button class="btn-send">Cari Kode</button>
                    {{Form::close()}}
	            </div>
	        </div>
	    </div> <!--.center_column-->
    </div>
</div>