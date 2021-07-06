@extends('layout.client.main')
@section('title')
    Market Place MultiFungsi
@endsection

@section('main-content')
          {{-- Image Slider --}}
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              @foreach ($slider as $item)
              <div class="carousel-item overlay {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100 o-img" src="{{ $item->image }}" alt="Second slide">
                <div class="carousel-caption d-none d-block">
                  <h5>{{ $item->produk_name }}</h5>
                  {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> --}}
                </div>
              </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          {{-- End Image SLider --}}


          {{-- Lelang Section --}}
          <div class="container mt-5">
            <h5 class="text-center subMain mb-4">Lelang Untuk Donasi</h5>
            <div class="main-bg scroll p-3">
              <div class="row">
                @foreach ($bid as $item)
                <div class="col-8 col-md-3 scroll-box">
                  <div class="card">
                    <img src="{{ asset('/storage/'.$item->image) }}" class="card-crop card-crop card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text regular"><small>{{ $item->nama_barang }}</small></p>
                      <small>Harga Tertinggi</small>
                      @foreach ($high as $tinggi)
                        @if ($tinggi->bid_id == $item->id)  
                          <h6 class="card-title">Rp.{{ number_format($tinggi->harga) }}</h6>
                        @endif
                      @endforeach
                      <small class="mb-3"><span class="text-secondary">{{ $item->name }}</small>
                      <div class="row text-center mt-3">
                        <a href="/bid/{{ $item->id }}" class="bid text-white"><i class="fas fa-gavel"></i> Bid</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          {{-- End Lelang --}}

          {{-- Video Section --}}
            <div class="container mt-5">
                <h5 class="text-center subMain mb-4">Video Terpopuler</h5>
                <div class="main-bg scroll p-3">
                <div class="row">

                    @foreach ($video as $item)
                    <div class="col-8 col-md-3 scroll-box">
                        <div class="card">
                        <!-- Button trigger modal -->
                        <img src="{{ $item->thumbnail }}" data-toggle="modal" data-target="#video1">
                        <h6 class="card-title m-3">{{ $item->user }}</h6>
                        <small class="mb-3"><span class="text-secondary m-3">{{ $item->caption }}</span></small>
                        {{-- modal --}}
                        <div class="modal fade" id="video1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered"role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <video width="100%" controls class="video">
                                    <source src="{{ asset('video/'.$item->video) }}" type="video/mp4">
                                    </video>
                                    {{-- <iframe src="{{ asset('video/video.mp4') }}" autoplay="off" frameborder="0"></iframe> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- end modal --}}
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
      {{-- End Video Section --}}


      {{-- PRODUK --}}
      <div class="container mt-5">
        <h5 class="text-center subMain mb-4">Produk Unggulan</h5>
        <div class="row">
          @foreach ($data as $item)
          <div class="col-6 col-md-3 mb-4">
            <div class="card">
              <img src="{{ $item->image }}" class="card-crop card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text regular"><small>{{ $item->produk_name }}</small></p>
                <h6 class="card-title">Rp.{{ number_format($item->harga) }}</h6>
                <small><span class="text-info">{{ $item->toko }}</span> - {{ $item->lokasi }}</small>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      {{-- END PRODUK --}}
@endsection

@push('js')
    <script>
         $('.carousel').carousel({
            interval: 2500
        });

        $('.modal').on('hidden.bs.modal',function(e){
          // $('.video').get(0).pause();
          $('.video').each(function() {
            $(this).get(0).pause();
          });
        });
    </script>
@endpush