<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1d954ea888.js"></script>
    {{-- Font Awesome --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Market Place</title>
  </head>
  <body>
    
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light main-bg">
        <div class="container d-flex justify-content-center">
            <form class="form-inline">
                <input type="text" class="form-control mb-2 mr-sm-2" style="width: 70%;border-radius:50px;border:none">
                <button type="submit" class="btn"><i class="text-white fas fa-search"></i></button>
                <button type="submit" class="btn"><i class="text-white fas fa-shopping-cart"></i></button>
              </form>
        </div>
      </nav>
    {{-- End Navbar --}}



    <!-- Bottom Navbar -->
  <nav class="navbar navbar-dark bg-info navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <h5>
            <i class="fas fa-home text-white"></i>
          </h5>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <h5>
            <i class="fas fa-home text-white"></i>
          </h5>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
        <h5>
            <i class="fas fa-home text-white"></i>
          </h5>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <h5>
            <i class="fas fa-home text-white"></i>
          </h5>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <h5>
            <i class="fas fa-home text-white"></i>
          </h5>
        </a>
      </li>
    </ul>
  </nav>
    {{-- Main Content --}}
        

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
      
      {{-- Bottom Nav --}}

      {{-- Lelang --}}
      <div class="container mt-5">
        <h5 class="text-center subMain mb-4">Lelang Untuk Donasi</h5>
        <div class="main-bg scroll p-3">
          <div class="row">
            @foreach ($bid as $item)
            <div class="col-8 col-md-3 scroll-box">
              <div class="card">
                <img src="{{ $item->image }}" class="card-crop card-crop card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text regular"><small>{{ $item->nama_barang }}</small></p>
                  <small>Harga Tertinggi</small>
                  <h6 class="card-title">Rp.{{ number_format($item->harga_tertinggi) }}</h6>
                  <small><span class="text-secondary">{{ $item->user }}</small>
                  <div class="row text-center">
                    <button type="submit" class="bid"><i class="fas fa-gavel"></i> Bid</button>
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


    {{-- End Main Content --}}










    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
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
  </body>
</html>