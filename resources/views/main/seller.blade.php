@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @if ($data->isEmpty())
                <div class="text-center">
                    <small class="text-info">Tidak ada yang perlu dikirim</small>
                </div>
                @else
                    <h5 class="text-center">Harus Dikirim</h5>
                @endif
                @foreach ($data as $item)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            {{-- {{ $result }} --}}
                            <div class="col-4 card-template">
                                <img src="{{ asset('/storage/'.$item->bid->image) }}" class="card-horizontal-crop" alt="...">
                                <div style="background-color:transparent;"></div>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h6>{{ $item->bid->nama_barang }}</h6>
                                    <p class="text-secondary">
                                        {{ $item->alamat->provinsi }},{{ $item->alamat->kota }} - {{ $item->alamat->kode_pos }}
                                        <br>
                                        <span class="mt-2">
                                            Rp.{{ number_format($item->bid->harga_win) }}
                                        </span>
                                    </p>
                                    @if ($item->status != 0)
                                        <div class="p-1 mb-2 bg-danger text-white text-center">Sudah Dikirim</div>
                                    @else
                                        <a href="/seller/detail/{{ $item->id }}" class="bid">Kirim</a>
                                    @endif
                                    {{-- <small>{{ }}</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection