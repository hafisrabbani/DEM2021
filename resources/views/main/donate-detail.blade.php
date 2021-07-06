@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div style="background-color: #fdfdfd">
        <img src="{{ $data->image }}" class="img-fluid" alt="">
        <div class="container pt-4">    
            <h5 class="pb-4 text-dark">{{ $data->name }}</h5>
            <div class="row">
                <div class="col-6">
                    <span class="text-info">Rp 3,200,000</span>
                </div>
                <div class="col-6 text-right">
                    <span class="text-secondary">Rp {{ number_format($data->target) }}</span>
                </div>
            </div>
            <div class="progress" style="height: 7px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="text-secondary">200 Donasi</p>
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="nilai" placeholder="Masukan Donasi Anda">
                </div>
                <button class="btn text-white" style="background-color:#f73575; width:100%">Donasi</button>
            </form>
            <div class="my-3" style="padding:10px;border-radius:3px; background-color:#c4e3f9;border:rgb(140, 255, 255)">
                <h6>Penggalang : {{ $data->user->username }}</h6>
            </div>
            <div class="card" style="border-radius:3px;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted">Deskripsi</h6>
                  <p class="card-text">{{ $data->description }}</p>
                </div>
            </div>


        </div>
    </div>
@endsection