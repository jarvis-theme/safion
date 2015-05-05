@if(Session::has('success'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, konfirmasi anda sudah terkirim.</p>					
</div>		
@endif

<div class="page-title">
	<div class="container">
		<h2 class="title"><i class="fa fa-shopping-cart"></i> Detail Order</h2>
		<hr />
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th><span>ID Order</span></th>
						<th class="desc"><span>Tanggal Order</span></th>
						<th><span>Detail Order</span></th>
						<th><span>Jumlah</span></th>
						<th><span>Jumlah yg belum dibayar</span></th>
						<th><span>No. Resi</span></th>
						<th><span>Status</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
						@if($checkouttype==1)
							{{prefixOrder().$order->kodeOrder}}
						@else
							{{prefixOrder().$order->kodePreorder}}
						@endif
						</td>
						<td>
						@if($checkouttype==1)
							{{waktu($order->tanggalOrder)}}
						@else
							{{waktu($order->tanggalPreorder)}}
						@endif
						</td>
						<td class="desc">
							<ul>
							@if ($checkouttype==1)
								@foreach ($order->detailorder as $detail)
								<li li style="margin-left: 8px">{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
								@endforeach
							@else
								<li li style="margin-left: 8px">{{$order->preorderdata->produk->nama}} ({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku->opsi1.($order->opsisku->opsi2!='' ? ' / '.$order->opsisku->opsi2:'').($order->opsisku->opsi3!='' ? ' / '.$order->opsisku->opsi3:'')}})
								 - {{$order->jumlah}}</li>
							@endif
							</ul>
						</td>
						<td class="quantity">
							@if($checkouttype==1)
							{{jadiRupiah($order->total)}}
							
							@else 
								@if($order->status < 2)
									{{jadiRupiah($order->total)}}
								@elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
									{{jadiRupiah($order->total - $order->dp)}}
								@else
									0
								@endif
							@endif
						</td>
						<td class="quantity">
							{{($order->status==2 || $order->status==3) ? jadiRupiah(0) : ' - '.jadiRupiah($order->total)}}
						</td>
						<td class="sub-price">
							{{ $order->noResi}}
						</td>
						<td class="total-price">
						@if($checkouttype==1)
							@if($order->status==0)
								<span class="label label-warning">Pending</span>
							@elseif($order->status==1)
								<span class="label label-important">Konfirmasi diterima</span>
							@elseif($order->status==2)
								<span class="label label-info">Pembayaran diterima</span>
							@elseif($order->status==3)
								<span class="label label-info">Terkirim</span>
							@elseif($order->status==4)
								<span class="label label-info">Batal</span>
							@endif
						@else 
							@if($order->status==0)
								<span class="label label-warning">Pending</span>
							@elseif($order->status==1)
								<span class="label label-important">Konfirmasi DP diterima</span>
							@elseif($order->status==2)
								<span class="label label-info">DP terbayar</span>
							@elseif($order->status==3)
								<span class="label label-info">Menunggu pelunasan</span>
							@elseif($order->status==4)
								<span class="label label-info">Pembayaran lunas</span>
							@elseif($order->status==5)
								<span class="label label-info">Terkirim</span>
							@elseif($order->status==6)
								<span class="label label-info">Batal</span>
							@elseif($order->status==7)
								<span class="label label-info">Konfirmasi Pelunasan diterima</span>
							@endif
						@endif	
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row inner-column">
			<div class="col-md-5">
			@if($order->jenisPembayaran==1)
				@if($checkouttype==1)                         
				{{Form::open(array('url'=> 'konfirmasiorder/'.$order->id, 'method'=>'put'))}}                            
				
				@else                         
				{{Form::open(array('url'=> 'konfirmasipreorder/'.$order->id, 'method'=>'put'))}}                           
				@endif
				<div class="form-group">
				  <label  class="control-label"> Nama Pengirim:</label>
				  <input type="text" class="form-control" id="search" placeholder="Nama Pengirim" name='nama' required>
				</div>
				<div class="form-group">
				  <label  class="control-label"> No Rekening:</label>
				  <input type="text" class="form-control" id="search" placeholder="No Rekening" name='noRekPengirim' required>
				</div>
				<div class="form-group">
				  <label  class="control-label"> Rekening Tujuan:</label>
				  <select name='bank' class="form-control">
					  <option value=''>-- Pilih Bank Tujuan --</option>
					  @foreach ($banktrans as $bank)
					  <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
					  @endforeach
				  </select>
				</div>
				<div class="form-group">
				  <label  class="control-label"> Jumlah:</label>
				  @if($checkouttype==1)        
					<input type="text" class="form-control" id="search" placeholder="jumlah yg terbayar" name='jumlah' value='{{$order->total}}' required>
				  @else
					@if($order->status < 2)
					  <input class="form-control" id="search" placeholder="jumlah yg terbayar" type="text" name='jumlah' value='{{$order->dp}}' required>
					@elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
					  <input class="form-control" id="search" placeholder="jumlah yg terbayar" type="text" name='jumlah' value='{{$order->total - $order->dp}}' required>
					@endif
				  @endif
				  
				</div>
				<button type="submit" class="btn btn-green">Konfirmasi Order</button>
				{{Form::close()}}
			@endif
			</div>
		</div>

		@if($paymentinfo!=null)
		<h3><center>Paypal Payment Details</center></h3><br>
			<hr>
			<div class="table-responsive">
			  <table class='table table-bordered'>
				  <tr>
					  <td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td>
				  </tr>
				  <tr>
					  <td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td>
				  </tr>
				  <tr>
					  <td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td>
				  </tr>
				  <tr>
					  <td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td>
				  </tr>
				  <tr>
					  <td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td>
				  </tr>
				  <tr>
					  <td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td>
				  </tr>
				  <tr>
					  <td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td>
				  </tr>
			  </table>
			</div>
		  <p>Thanks you for your order.</p>
		  <br>
		@endif 
	  

	  @if($order->jenisPembayaran==2)
		  <h3><center>Konfirmasi Pemabayaran Via Paypal</center></h3><br>
		  <p>Silakan melakukan pembayaran dengan paypal Anda secara online via paypal payment gateway. Transaksi ini berlaku jika pembayaran dilakukan sebelum {{$expired}}. Klik tombol "Bayar Dengan Paypal" di bawah untuk melanjutkan proses pembayaran.</p>
		  {{$paypalbutton}}
		  <br>
	  @endif
   </div>
</div>
