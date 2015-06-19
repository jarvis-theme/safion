@if(Session::has('error'))
    <div class="error" id='message' style='display:none'>
        {{Session::get('error')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="success" id='message' style='display:none'>
        <p>Selamat, anda sudah berhasil register. Silakan check email untuk mengetahui informasi akun anda.</p>
    </div>
@endif
@if(Session::has('errorrecovery'))
    <div class="error" id='message' style='display:none'>
        <p>Maaf, email anda tidak ditemukan.</p>
    </div>
@endif  

<div class="container">
    <div class="inner-column row">
        <div id="center_column" class="col-lg-9 col-xs-12 col-sm-8">
            <hr>
            <h2>Forget Password</h2>
            <br>
            {{Form::open(array('url' => 'member/recovery/'.$id.'/'.$code, 'class' => 'form-horizontal'))}}
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2">Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password" placeholder="Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2">Konfirmasi Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                </div>
            {{Form::close()}}
            <br>
        </div>
        <div class="col-lg-3 col-xs-12 col-sm-4 pull-left">
            <div id="advertising" class="block">
                @foreach(vertical_banner() as $banner)
                <div class="img-block">
                    <a href="{{url($banner->url)}}">
                        {{HTML::image(banner_image_url($banner->gambar),'banner',array('width'=>'272','height'=>'391','class'=>'img-responsive'))}}
                    </a>
                </div>
                @endforeach
            </div>
            <br>
        </div>
    </div>
</div>