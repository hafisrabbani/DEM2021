@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <h5 class="text-muted mb-4 text-center">Menunggu Pembayaran</h5>
                @foreach ($data as $item)
                    <div class="jumbotron jumbotron-fluid" style="background-color: transparent;border:1px solid #eaeaea;">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-5 text-center">
                                    <img src="{{ asset('/storage/'.$item->bidMain->image) }}" alt="" style="width: 100%;height:90px;">
                                </div>
                                <div class="col-7">
                                    <h5 class="text-muted">{{ $item->bidMain->nama_barang }}</h5>
                                    <small>Rp{{ number_format($item->total) }}</small>
                                    <br>
                                    @if ($item->bukti!==NULL)
                                        <a href="/bill/wait-paid/{{ $item->id }}" class="disabled btn btn-info p-2"><small>Sedang Verifikasi</small></a>
                                    @else
                                        <a href="/bill/wait-paid/{{ $item->id }}" class="btn btn-info px-5">Bayar!</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection