@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @foreach ($data as $item)
                <h5 class="medium text-center mb-4">Alamat Anda</h5>
                    <div class="card">
                        <div class="card-header">
                            {{ $item->nama }}
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <small>Penerima : {{ $item->penerima }}</small>
                                <br>
                                <p><small><span class="badge badge-primary">{{ $item->provinsi }}</span> <span class="badge badge-info">{{ $item->kota }}</span> <span class="badge badge-success">{{ $item->provinsi }}</span></small></p>
                                <footer><small>{{ $item->alamat }}</small></footer>
                            </blockquote>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="fixed-bottom text-right mr-3" style="margin-bottom: 70px;">
        <button type="button" class="btn btn-success rounded-circle text-center" data-toggle="modal" data-target="#insert"><i class="fas fa-plus"></i></button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="insert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus"></i> Alamat</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/alamat" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="#nama">Nama Alamat</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="#penerima">Penerima</label>
                        <input type="text" class="form-control" name="penerima" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="#provinsi">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" id="provinsi">
                    </div>
                    <div class="form-group">
                        <label for="#kota">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota">
                    </div>
                    <div class="form-group">
                        <label for="#kode_pos">Kode Pos</label>
                        <input type="number" class="form-control" name="kode_pos" id="kode_pos">
                    </div>
                    <div class="form-group">
                        <label for="#kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                    </div>
                    <div class="form-group">
                        <label for="#alamat">Kecamatan</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endsection