@extends('layout.admin.main')
@section('title')
    verifikasi
@endsection
@section('page')
    Verifikasi Pemenang Lelang
@endsection
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pemenang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                        @if (strtotime($item->bidMain->last_bid) < strtotime(date('Y-m-d H:i:s')))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->bidMain->nama_barang }}</td>
                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td>
                                    @if ($item->bidMain->pemenang == NULL)    
                                        <form action="{{ route('admin.win') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                            <input type="hidden" name="harga" value="{{ $item->harga }}">
                                            <input type="hidden" name="bid_id" value="{{ $item->bid_id }}">
                                            {{-- <input type="hidden" name="bid_id" value="{{ $item->bid_id }}"> --}}
                                            <button class="btn btn-success"><i class="fas fa-bell"></i> Push Notif</button>
                                        </form>
                                    @else
                                        <p class="text-success">Notifikasi Telah Dikirim</p>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
</script>
@endpush