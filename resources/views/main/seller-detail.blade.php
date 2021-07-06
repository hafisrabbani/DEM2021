@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @foreach ($data as $item) 
                <div class="card">
                    <img src="{{ asset('/storage/'.$item->bid->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h6>Harus Dikirimkan</h6>
                      <div  class="border p-4 rounded border-info">
                        <small>
                            {{ $item->alamat->provinsi }},{{ $item->alamat->kota }} - {{ $item->alamat->kode_pos }}
                            <br>
                            {{ $item->alamat->alamat }}
                        </small>                        
                    </div>
                    </div>
                </div>
                @if ($item->resi === NULL)
                <form action="{{ route('seller.detail.post',$item->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="resi">Masukan Resi</label>
                        <input type="text" class="form-control" name="resi" id="resi">
                        <small class="form-text text-danger"><small>Mengisi resi berarti anda sudah mengirim paket tersebut!</small></small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info">Submit</button>
                </form>
                @else
                    <div class="p-3 mb-2 bg-danger text-white text-center">Anda Sudah Mengirim Paket Ini</div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection