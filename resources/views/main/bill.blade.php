@extends('layout.client.main')
@section('title')
    Pembayaran
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 text-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoqWIPKg9kRQhn9r3qgpcRSACAXvg-dbTOWQiDN6b5ahLRZ-AU_ioL_uXv5Un0kNGPNhE&usqp=CAU" class="rounded-circle img-thumbnail" style="width:60px; height:60px;" alt="">
                            </div>
                            <div class="col-8">
                                <h3 class="text-muted">{{ $user->username }}</h3>
                                <small>{{ $user->email }}</small>
                                <br>
                                <small>Saldo Donasi : Rp.{{ number_format($user->saldo) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 text-center">
                                <h5 class="text-info">
                                    <a href="/bill/wait-paid" class="nav-link notif fa fa-wallet">
                                        @if ($bill != 0)
                                        <span class="fa fa-comment"></span>
                                        <span class="num">{{ $bill }}</span>
                                        @endif
                                    </a>
                                </h5>
                                <small>Belum Bayar</small>
                            </div>
                            <div class="col-4 text-center">
                               <h5 class="text-info">
                                    <a href="/shipment" class="nav-link notif fa fa-box">
                                       
                                    </a>
                                </h5>
                                <small>Pengiriman</small>
                            </div>
                            <div class="col-4 text-center">
                                <h5 class="text-info">
                                    <a href="#" class="nav-link notif fa fa-star">
                                       
                                    </a>
                                </h5>
                                <small>Penilaian</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="border-radius:0px;">
                    <div class="card-header">           
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><a href="/alamat" class="text-secondary">Alamat</a></li>
                      <li class="list-group-item"><a href="/seller" class="text-secondary">Seller Area</a></li>
                      <li class="list-group-item">Saldo</li>
                      <li class="list-group-item">Logout</li>
                    </ul>
                  </div>
            </div>
        </div>
    </div>
@endsection