<div class="page-title">
    <div class="container">
        <h2 class="title"><i class="fa fa-shopping-cart"></i> Detail Order</h2>
        <hr />
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><span>ID Order</span></th>
                        <th><span>Tanggal Order</span></th>
                        <th><span>Detail Order</span></th>
                        <th><span>Jumlah</span></th>
                        @if($checkouttype != 1)
                        <th><span>Jumlah yg belum dibayar</span></th>
                        @endif
                        <th><span>No. Resi</span></th>
                        <th><span>Status</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$checkouttype==1 ? prefixOrder().$order->kodeOrder : prefixOrder().$order->kodePreorder}}</td>
                        <td>{{$checkouttype==1 ? waktu($order->tanggalOrder) : waktu($order->tanggalPreorder)}}</td>
                        <td class="desc">
                            <ul>
                            @if ($checkouttype==1)
                                @foreach ($order->detailorder as $detail)
                                <li class="order-detail">{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku->opsi1.($detail->opsisku->opsi2 != '' ? ' / '.$detail->opsisku->opsi2:'').($detail->opsisku->opsi3 !='' ? ' / '.$detail->opsisku->opsi3:'').')':''}} - {{$detail->qty}}</li>
                                @endforeach
                            @else
                                <li class="order-detail">{{$order->preorderdata->produk->nama}} ({{$order->opsiSkuId==0 ? 'No Opsi' : $order->opsisku->opsi1.($order->opsisku->opsi2!='' ? ' / '.$order->opsisku->opsi2:'').($order->opsisku->opsi3!='' ? ' / '.$order->opsisku->opsi3:'')}})
                                 - {{$order->jumlah}}</li>
                            @endif
                            </ul>
                        </td>
                        <td class="quantity">
                            @if($checkouttype==1)
                            {{price($order->total)}}
                            
                            @else 
                                @if($order->status < 2)
                                    {{price($order->total)}}
                                @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                    {{price($order->total - $order->dp)}}
                                @else
                                    0
                                @endif
                            @endif
                        </td>
                        @if($checkouttype != 1)
                        <td class="quantity">
                            {{($order->status==2 || $order->status==3) ? price(0) : ' - '.price($order->total)}}
                        </td>
                        @endif
                        <td class="sub-price">{{ $order->noResi}}</td>
                        <td class="total-price">
                        @if($checkouttype==1)
                            @if($order->status==0)
                                <span class="label label-warning">Pending</span>
                            @elseif($order->status==1)
                                <span class="label label-danger">Konfirmasi diterima</span>
                            @elseif($order->status==2)
                                <span class="label label-info">Pembayaran diterima</span>
                            @elseif($order->status==3)
                                <span class="label label-success">Terkirim</span>
                            @elseif($order->status==4)
                                <span class="label label-default">Batal</span>
                            @endif
                        @else 
                            @if($order->status==0)
                                <span class="label label-warning">Pending</span>
                            @elseif($order->status==1)
                                <span class="label label-danger">Konfirmasi DP diterima</span>
                            @elseif($order->status==2)
                                <span class="label label-info">DP terbayar</span>
                            @elseif($order->status==3)
                                <span class="label label-info">Menunggu pelunasan</span>
                            @elseif($order->status==4)
                                <span class="label label-info">Pembayaran lunas</span>
                            @elseif($order->status==5)
                                <span class="label label-success">Terkirim</span>
                            @elseif($order->status==6)
                                <span class="label label-default">Batal</span>
                            @elseif($order->status==7)
                                <span class="label label-info">Konfirmasi Pelunasan diterima</span>
                            @endif
                        @endif  
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </div>
        @if($order->jenisPembayaran==1 && $order->status == 0) 
        <div class="well">
            <div class="row inner-column">
                <div class="col-sm-6 col-sm-offset-3">
                    @if($checkouttype==1) 
                    {{-- */  $form_url = 'konfirmasiorder/' /* --}}
                    @else 
                    {{-- */  $form_url = 'konfirmasipreorder/' /* --}}
                    @endif

                    <h2><b>{{trans('content.step5.confirm_btn')." ".trans('content.step3.transfer')}}</b></h2><hr>
                    {{Form::open(array('url'=> $form_url.$order->id, 'method'=>'put'))}}                           
                        <div class="form-group">
                            <label  class="control-label"> Nama Pengirim:</label>
                            <input type="text" class="form-control" placeholder="Nama Pengirim" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> No Rekening:</label>
                            <input type="number" class="form-control" placeholder="No Rekening" name="noRekPengirim" style="height: 36px" required>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> Rekening Tujuan:</label>
                            <select name="bank" class="form-control" required>
                                <option value=''>-- Pilih Bank Tujuan --</option>
                                @foreach ($banktrans as $bank)
                                <option value="{{$bank->id}}">{{$bank->bankdefault->nama}} - {{$bank->noRekening}} - A/n {{$bank->atasNama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"> Jumlah:</label>
                            @if($checkouttype==1)        
                            <input type="number" class="form-control" placeholder="Jumlah Transfer" name="jumlah" value="{{$order->total}}" style="height: 36px;" required>
                            @else
                                @if($order->status < 2)
                                <input class="form-control" placeholder="Jumlah Transfer" type="number" name="jumlah" value="{{$order->dp}}" required>
                                @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                <input class="form-control" id="search" placeholder="Jumlah Transfer" type="number" name="jumlah" value="{{$order->total - $order->dp}}"  style="height: 36px;" required>
                                @endif
                            @endif
                        </div>
                        <button type="submit" class="btn btn-danger">{{trans('content.step5.confirm_btn')}}</button>
                    {{Form::close()}}
                </div>
            </div>
        </div>
        @endif

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
        <div class="well">
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Paypal</b></h2><hr>
                <p>{{trans('content.step5.paypal')}}</p>
            </center><br>
            <center id="paypal">{{$paypalbutton}}</center>
            <br>
        </div>
        @elseif($order->jenisPembayaran==4) 
            @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
            <div class="well">
                <center>
                    <h2><b>{{trans('content.step5.confirm_btn')}} iPaymu</b></h2><hr>
                    <p>{{trans('content.step5.ipaymu')}}</p><br>
                    <a class="btn btn-info" href="{{url('ipaymu/'.$order->id)}}" target="_blank">{{trans('content.step5.ipaymu_btn')}}</a>
                </center>
                <br>
            </div>
            @endif
        @elseif($order->jenisPembayaran==5 && $order->status == 0)
        <div class="well">
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} DOKU MyShortCart</b></h2><hr>
                <p>{{trans('content.step5.doku')}}</p><br>
                {{ $doku_button }}
            </center>
            <br>
        </div>
        @elseif($order->jenisPembayaran == 6 && $order->status == 0)
        <div class="well">
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Bitcoin</b></h2><hr>
                <p>{{trans('content.step5.bitcoin')}}</p><br>
                {{$bitcoinbutton}}
            </center>
            <br>
        </div>
        @elseif($order->jenisPembayaran == 8 && $order->status == 0)
        <div class="well">
            <center>
                <h2><b>{{trans('content.step5.confirm_btn')}} Veritrans</b></h2><hr>
                <p>{{trans('content.step5.veritrans')}}</p><br>
                <button class="btn-veritrans" onclick="location.href='{{ $veritrans_payment_url }}'">{{trans('content.step5.veritrans_btn')}}</button>
            </center>
            <br>
        </div>
        @endif
   </div>
</div>
