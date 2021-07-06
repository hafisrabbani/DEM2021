@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @if ($data->isEmpty())
                    <h6 class="text-center">Tidak Ada Dikirim</h6>
                @else
                    @foreach ($data as $item)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-4 card-template">
                                    <img src="{{ asset('/storage/'.$item->invoice->bid->image) }}" class="card-horizontal-crop" alt="...">
                                    <div style="background-color:transparent;"></div>
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h6>{{ $item->nama_barang }}</h6>
                                        <p class="text-secondary">
                                            <small>Resi : {{ $item->resi }}</small>
                                        </p>
                                        @if ($item->status == 0)
                                            <form action="/shipment" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-success btn-sm">Sudah Diterima</button>
                                                    <br>
                                                    <small class="text-danger"><small>Klik Jika Pesanan Sudah Diterima</small></small>
                                                </div>
                                            </form>
                                        @else
                                            <small class="text-success">Paket Sudah Diterima</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection