@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                <h5 class="medium text-center mb-4">History</h5>
                <ul class="list-group">
                    @foreach ($data as $item)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('/storage/'.$item->image) }}" class="img-fluid" style="max-height: 100px;">
                            </div>
                            <div class="col-8">
                                <h6>{{ $item->nama_barang }}</h6>
                                <small>Status : 
                                    @if ($item->status == 0)
                                        <span class="badge badge-info">Menunggu Verifikasi</span>
                                    @elseif($item->status == 1)
                                        <span class="badge badge-success">Verifikasi Berhasil</span>
                                    @else
                                        <span class="badge badge-danger">Verifikasi Ditolak</span>
                                        FeedBack : 
                                        <br>
                                        {{ $data->pesan }}
                                    @endif
                                </small>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection