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
            .navbar-light .navbar-brand {
                color: white;
            }
        </style>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="tittle-font" href="#">TB Abadi Mulia 6</a>
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
                  <a class="nav-link" href="#">{{CRUDBooster::myName()}}</a>
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
								        <th>No.</th>
								        <th>Pelayan</th>
								        <th>No. Transaksi</th>
                                        <th>Waktu Transaksi</th>
                                        <th>Detail</th>
								      </tr>
								    </thead>
								    <tbody>
                                      @foreach($data as $p)
								      <tr>
								        <td>1</td>
								        <td>{{$p->namapelayan}}</td>
								        <td>9</td>
                                        <td>{{$p->created_at}}</td>
                                        <td><a href="pembayaran" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
								      </tr>
                                      @endforeach
								    </tbody>
                              
								</table>
                                
                            </div>
                        </div>
                    </div> <!-- row -->

</body>

@stop