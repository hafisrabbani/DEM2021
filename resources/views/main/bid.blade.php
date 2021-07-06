@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @if (empty($data->toArray()))
                    <p class="text-center">Belum Ada Lelang</p>
                @endif
                @foreach ($data as $item)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            {{-- {{ $result }} --}}
                            <div class="col-4 card-template">
                                <img src="{{ asset('/storage/'.$item->image) }}" class="card-horizontal-crop" alt="...">
                                <div style="background-color:transparent;"></div>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_barang }}</h5>
                                    <small><i class="fas fa-user"></i> : {{ $item->user->username }}</small>
                                    @foreach ($high as $result)
                                        @if ($item->id == $result->bid_id)
                                            <p class="card-text"><small>Harga saat ini : Rp. {{ number_format($result->harga) }}</small></p>
                                        @endif
                                    @endforeach
                                    <div class="row text-center">
                                        <a href="/bid/{{ $item->id }}" class="bid text-white"><i class="fas fa-gavel"></i> Bid</a>
                                        {{-- <button type="submit" class="bid"><i class="fas fa-gavel"></i> Bid</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="fixed-bottom text-right mr-3" style="margin-bottom: 70px;">
                    <button type="button" class="btn btn-success rounded-circle text-center" data-toggle="modal" data-target="#insert"><i class="fas fa-plus"></i></button>
                </div>
                <div class="fixed-bottom text-right mr-3" style="margin-bottom: 120px;">
                    <a href="/bid/history" class="btn btn-primary rounded-circle notif-main fa fa-bell">
                        @if ($notifmain !== 0)
                        <span class="fa fa-comment"></span>
                        <span class="num">{{ $notifmain }}</span>
                        @endif
                      </a>
                </div>
                <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">                        
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" action="/bid">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nama">Nama Barang</label>
                                        <input type="text" name="nama" class="form-control" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="deskripsi" id="description" cols="30" rows="7" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Last Bid</label>
                                        <input type="datetime-local" id="date" name="last" class="form-control">
                                    </div>
                                    <label for="upload">Upload Gambar</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="input">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" id="upload" class="custom-file-input" id="inputGroupFile01" aria-describedby="input" name="gambar">
                                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection