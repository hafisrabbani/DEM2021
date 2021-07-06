@extends('layout.admin.main')
@section('title')
    verifikasi
@endsection
@section('page')
    Verifikasi Barang Lelang
@endsection
@section('main')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Barang Lelang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Batas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Batas</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>
                                @if ($item->status === 1)
                                    <span class="text-success">Verifikasi Berhasil</span>
                                @elseif($item->status === 3)
                                    <span class="text-danger">Verifikasi Ditolak</span>
                                @else
                                <span class="text-warning">Belum Verifikasi</span>
                                @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image{{ $item->id }}">
                                    Show <i class="fas fa-images"></i>
                                </button>
                            </td>
                            <td>
                                {{ date('d-m-Y H:i:s',strtotime($item->last_bid)) }}
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#action{{ $item->id }}">
                                    Action <i class="fas fa-clipboard"></i>
                                    </button>
                                @endif
                                @if(strtotime($item->last_bid) > strtotime(date('Y-m-d H:i:s')))
                                <form action="{{ route('admin.bidStop') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" name="submit" class="btn btn-danger">Selesaikan</button>
                                </form>
                                @else
                                    <span class="badge badge-success">Lelang Telah selesai</span>
                                @endif
                            </td>
                       </tr> 
                       <!-- Modal image -->
                       <div class="modal fade" id="image{{ $item->id }}" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Gambar Barang ({{ $item->nama_barang }} - {{ $item->user->username }})</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="img-fluid" src="{{ asset('storage/'.$item->image) }}" alt="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- end image Modal --}}

                        {{-- action modal --}}
                        <div class="modal fade" id="action{{ $item->id }}" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.bid') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <label>Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="Approve" value="true" required>
                                            <label class="form-check-label" for="Approve">
                                              Setujui <span class="text-success"><i class="fas fa-check"></i></span>
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="Reject" value="false">
                                            <label class="form-check-label" for="Reject">
                                              Tolak <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </label>
                                          </div>
                                          <hr style="border:1px solid #eaeaea">
                                          <div class="form-group textarea">
                                            <label for="textareaLabel">Alasan : </label>
                                            <textarea class="form-control" id="textareaLabel" name="pesan" rows="3"></textarea>
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
                        {{-- end action modal --}}
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

<!-- Page level custom scripts -->


<script>
    $(document).ready(function(){
        $("#dataTable").DataTable();
        $(".textarea").hide();
        $('input[name$="status"]').click(function(){
            var section = $(this).val();

            if(section == "false"){
                $(".textarea").show();
            }else{
                $(".textarea").hide();
            }

        });
    });
</script>
@endpush