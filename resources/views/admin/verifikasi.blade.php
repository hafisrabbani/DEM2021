@extends('layout.admin.main')
@section('title')
    verifikasi
@endsection
@section('page')
    Verifikasi Pembayaran
@endsection
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="text-center">
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->bidMain->nama_barang }}</td>
                            <td>Rp.{{ number_format($item->total) }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <span class="text-danger">Belum Verifikasi</span>
                                @else
                                    <span class="text-success">Sudah Verifikasi</span>
                                @endif
                            </td>
                            <td class=""><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bukti{{ $item->id }}">
                                Bukti
                            </button></td>
                            <td>
                                <form action="{{ route('admin.pembayaran') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button type="submit" name="submit" class="btn btn-warning">Verifikasi</button>
                                  </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="bukti{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <img src="{{ '/storage/'.$item->bukti }}" class="img-thumbnail" alt="">
                              </div>
                            </div>
                          </div>
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