@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @foreach ($data as $item)
                    <div class="jumbotron jumbotron-fluid" style="background-color: transparent;border:transparent;">
                        <img src="{{ asset('/storage/'.$item->bidMain->image) }}" class="img-fluid">
                        <div class="card">
                            <div class="card-body" style="border:0px solid rgb(138, 135, 135)(138, 135, 135)(138, 135, 135)(138, 135, 135)(138, 135, 135);">
                              <h5 class="card-title">{{ $item->bidMain->nama_barang }}</h5>
                              <p class="card-text">Mohon Segera Melunasi Sebesar
                                  <br>
                                  <span class="bg-info px-2 py-1 text-white">Rp.{{ number_format($item->bidMain->harga_win) }}</span></p>

                                  <a class="text-muted" data-toggle="collapse" href="#caraBayar" role="button" aria-expanded="false" aria-controls="caraBayar">
                                    Cara Bayar <i class="fas fa-arrow-alt-circle-down"></i>
                                  </a>
                                  <div class="collapse" id="caraBayar">
                                    <div class="card card-body">
                                      <ol>
                                          <li>Transfer Ke rekening A <span class="bg-info text-white p-1">432423211</span></li>
                                          <li>Pilih Alamat</li>
                                          <li>Bayar Dengan Sejumlah Rp{{ number_format($item->bidMain->harga_win) }}</li>
                                          <li>Upload Bukti Pendafataran</li>
                                          <li>Tunggu Verifikasi</li>
                                      </ol>
                                    </div>
                                  </div>
                                  <br>
                                  <a class="text-muted" data-toggle="collapse" href="#bayar" role="button" aria-expanded="false" aria-controls="bayar">
                                    Bayar Sekarang <i class="fas fa-arrow-alt-circle-down"></i>
                                  </a>
                                  <div class="collapse" id="bayar">
                                    <div class="card card-body">
                                      @if ($alamat->isEmpty())
                                        <small class="text-danger text-center">Anda Belum Buat Alamat</small>
                                        <a href="/alamat" class="btn btn-danger">Buat Alamat</a>
                                      @else
                                            <form class="mt-2" action="/bill/wait-paid/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $item->id }}">
                                              <h6>Upload Bukti Transfer</h6>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" name="file" id="inputFile">
                                                      <label class="custom-file-label" for="inputFile" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="alamat">Alamat</label>
                                              <select name="alamat" class="form-control" id="alamat">
                                                @foreach ($alamat as $add)
                                                <option value="{{ $add->id }}" style="overflow: hidden">{{ $add->nama }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-info">Bayar</button>
                                          </form>
                                      </div>
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