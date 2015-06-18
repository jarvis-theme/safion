@if(Session::has('errorlogin'))
<div class="error" id='message' style='display:none'>
    <p>Maaf, email atau password anda salah.</p>
</div>
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
    {{Session::get('error')}}!!!
</div>
@endif
@if(Session::has('errorrecovery'))
<div class="error" id='message' style='display:none'>
    <p>Maaf, email anda tidak ditemukan.</p>
</div>
@endif
@if(Session::has('forget'))
<div class="success" id='message' style='display:none'>
    <p>Cek email untuk me-reset password anda!</p>
</div>  
@endif
@if(Session::has('error'))
<div class="error" id='message' style='display:none'>
    <p>{{Session::get('error')}}</p>
</div>  
@endif

<div class="container">
    <div id="breadcrumb">
        <div class="container">
            Member Area
        </div>
    </div>
    <hr>
    <div class="inner-column row">
        <div id="center_column" class="col-lg-6 col-xs-12 col-sm-5">
            <h2>Lupa Password</h2><hr><br>
            <div class="input-group">
                <form class="form-horizontal" action="{{url('member/forgetpassword')}}" method="post">
                    <input type="text" class="form-control" placeholder="Email" required>
                    <span class="input-group-btn">
                        <button class="btn btn-green" type="button">Reset Password</button>
                    </span>
                </form>
            </div>
            <br><br>
        </div>
        <div id="center_column" class="col-lg-5 col-md-offset-1">
            <h2>Pelanggan Baru</h2><hr><br>
            <p>Nikmati kemudahan berbelanja dengan mendaftar sebagai member.</p>
            <div class="input-group">
                <span class="input-group-btn">
                    <a href="{{url('member/create')}}" class="btn btn-red">Daftar</a>
                </span>
            </div>
        </div>
    </div>
</div>