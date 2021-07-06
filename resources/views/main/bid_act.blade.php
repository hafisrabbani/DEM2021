@extends('layout.client.main')
@section('title')
    Lelang
@endsection

@section('main-content')
    <div class="jumbotron jumbotron-fluid" style="background:linear-gradient(0deg, rgba(59, 59, 59, 0.7),
     rgba(248, 248, 248, 0)), url({{ asset('/storage/'.$bid->image) }});background-position:center;background-size:cover">
        <div class="container">
            <br><br><br>
            <h3 class="display-6 text-white mb-3">{{ $bid->nama_barang }}</h3>
            {{-- <p class="badge badge-primary">{{ $bid->user->name }}</p> --}}
        </div>
    </div>
    <div class="container">
        <div class="row" style="background-color: white;margin-top:-50px; border-radius:20px 20px 0 0">
            <div class="col-12">
                <div class="mt-4">
                    @if ($now > strtotime($bid->last_bid))
                    <div class="text-center alert alert-danger" role="alert">
                        Lelang Ditutup
                    </div>
                    @endif
                    <h6 class="medium">Harga saat ini : <span class="badge badge-warning">
                        @if (!$bidNow)
                            Belum Ada Penawaran
                        @else
                        Rp.{{ number_format($bidNow->harga) }} - {{ $bidNow->user->username }}</span>
                        @endif
                    </h6>
                    <h6 class="medium">Penggalang  : <span class="badge badge-primary">{{ $bid->user->name }}</span></h6>
                    <h6 class="medium">Berakhir Dalam : {{ date("d-m-Y H:i:s",strtotime($bid->last_bid)) }}</h6>
                    <h6 class="medium">Description :  </h6>
                    {{-- {{ $bid->last_bid }} --}}
                    <p class="text-secondary mt-3">{{ $bid->description }}</p>
                    @if($now < strtotime($bid->last_bid))
                    <form class="mb-5 pb-5" action="/bid/{{ $bid->id }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $bid->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Masukan Harga Penawaran</label>
                            @if ($bid->user_id == session('id'))
                            <fieldset disabled>
                                <input type="number" name="tawar" class="form-control" placeholder=">< Yahaha anda gabisa masang harga">
                                <small class="text-danger">Anda tidak bisa mengikuti lelang yang anda buat</small>
                            </fieldset>
                            @else
                                @if (!$bidNow)
                                <input type="number" name="tawar" class="form-control" placeholder=">Rp.0">
                                @else
                                <input type="number" name="tawar" class="form-control" placeholder=">Rp.{{ number_format($bidNow->harga) }}">
                                @endif
                                <small>Harap Memasukan Harga Diatas Harga tertinggi sekarang</small>
                                <button type="submit" name="submit" class="btn btn-primary">Tawar</button>
                            @endif
                        </div>
                    </form>
                    @else
                        @if (!$bidNow)  
                        @else  
                        <div class="text-center alert alert-info" role="alert">
                            <h6>Dimenangkan Oleh</h6>
                            <p>{{ $bidNow->user->username }}</p>
                            <p>Rp.{{ number_format($bidNow->harga) }}</p>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection