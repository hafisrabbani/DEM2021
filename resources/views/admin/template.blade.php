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
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabel" width="100%" cellspacing="0">
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