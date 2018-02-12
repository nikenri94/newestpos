@extends('include.include')
@section('content')

<body>
	<style type="text/css">
            
            .bg-light{
                background-color: rgb(0, 123, 255)!important;
                box-shadow: 0 2px 6px -2px rgba(0,0,0,.25);
            }
            a.tittle-font{
                color: white;
            }
        </style>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand tittle-font" href="underconstruct">TB Abadi Mulia 6</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="underconstruct">Home</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="underconstruct">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="event">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tdtechno">Today's Techno</a>
                </li>
                <li class="nav-item">
                  <img src="{{CRUDBooster::myPhoto()}}">
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login">Login</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>   

        <div class="container">
            <section class="panel">
                <div class="panel panel-footer">
                <header class="panel panel-default">
                    <h1><center>KASIR</center></h1>
                   
                </header>
                   
                </div>
                <div class="
                panel panel-footer">
                {!!Form::open(array('route'=>'insert','id'=>'frmsave','method'=>'post'))!!}
                   
                    
                    <div class="row">
                                               
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                            <h3>Data Penjualan</h3>
                            <br> 
                                <table class="table table-striped">
                                 
              								    <thead>
              								      <tr>
              								        <th>Nama Produk</th>
                                        <th>Stok</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th style="display:none" >konversi</th>
                                        <th style="display:none" >tot_qty</th>
                                        <th style="display:none" >Price</th>
                                        <th>Harga</th>
                                        <th>Diskon (%)</th>
                                        <th>Amount</th>
              								      </tr>
              								    </thead>
              								    <tbody>
              								      <tr>
              								        <td>1</td>
              								        <td>{{$p->namapelayan}}</td>
              								        <td>john@example.com</td>
                                      <td>Mary</td>
                                      <td>Mary</td>
                                      <td>Mary</td>
                                      <td><a href="pembayaran" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
              								      </tr>
                                    
              								    </tbody>
                                            
              								</table>
                                
                            </div>
                        </div>
                    </div> <!-- row -->
                </div>
                <div class="panel panel-footer">
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="#" class="btn btn-warning" onclick="openBayar()"><h3>Bayar Cash</h3></a>
                      <div class="row" style="margin-top: 50px;">
                        <div class="col-lg-6">
                          <div class="form-group" id="cashtot" style="display: none;">
                              <b>Total</b><input type="text" class="form-control" name="total" placeholder="Total">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" id="cashdis" style="display: none;">
                              <b>Diskon</b><input type="text" class="form-control" name="diskon" placeholder="Diskon" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" id="cashbayar" style="display: none;">
                              <b>Bayar</b><input type="text" class="form-control" name="bayar" placeholder="bayar">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" id="cashkembali" style="display: none;">
                              <b>Kembalian</b><input type="text" class="form-control" name="kembalian" placeholder="Kembalian">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" id="cashsave" style="display: none;">
                              <a href="" class="btn btn-primary"><h3>Simpan dan Cetak</h3></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <a href="#" class="btn btn-warning" onclick="openCredit()"><h3>Bayar Credit</h3></a>
                      <div class="row" style="margin-top: 50px;">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;" id="credtot">
                              <b>Total</b><input type="text" class="form-control" name="total"  placeholder="Total">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;" id="creddiskon">
                              <b>Diskon</b><input type="text" class="form-control" name="diskon"  placeholder="Diskon" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;"  id="credbayar">
                              <b>Bayar DP</b><input type="text" class="form-control" name="bayar" placeholder="bayar">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;" id="credsisa">
                              <b>Sisa</b><input type="text" class="form-control" name="sisa"  placeholder="Sisa">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;" id="credtgl">
                              <b>Tanggal Tempo</b><input type="text" class="form-control" name="credtgl" placeholder="Tanggal Tempo">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group" style="display: none;" id="credsave">
                              <a href="" class="btn btn-primary"><h3>Simpan dan Cetak</h3></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   
                </div>
</body>
<script type="text/javascript">
  function openBayar() {
    document.getElementById("cashtot").style.display = 'block';
    document.getElementById("cashdis").style.display = 'block';
    document.getElementById("cashbayar").style.display = 'block';
    document.getElementById("cashkembali").style.display = 'block';
    document.getElementById("cashsave").style.display = 'block';
    document.getElementById("credtot").style.display = 'none';
    document.getElementById("creddiskon").style.display = 'none';
    document.getElementById("credbayar").style.display = 'none';
    document.getElementById("credsisa").style.display = 'none';
    document.getElementById("credtgl").style.display = 'none';
    document.getElementById("credsave").style.display = 'none';
  }
  function openCredit(){
    document.getElementById("credtot").style.display = 'block';
    document.getElementById("creddiskon").style.display = 'block';
    document.getElementById("credbayar").style.display = 'block';
    document.getElementById("credsisa").style.display = 'block';
    document.getElementById("credtgl").style.display = 'block';
    document.getElementById("credsave").style.display = 'block';
    document.getElementById("cashtot").style.display = 'none';
    document.getElementById("cashdis").style.display = 'none';
    document.getElementById("cashbayar").style.display = 'none';
    document.getElementById("cashkembali").style.display = 'none';
    document.getElementById("cashsave").style.display = 'none';
  }
</script>

@stop