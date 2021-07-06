@extends('layout.client.main')
@section('title')
    lelang untuk donasi
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 mt-4">
                @foreach($data as $item)
                    <a href="/donate/{{ $item->id }}" class="text-secondary" style="text-decoration:inherit">
                        <div class="card">
                            <img src="{{ $item->image }}" class="card-img-top">
                            <div class="card-body">
                            <h6 class="card-title">{{ $item->name }}</h6>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 text-left">
                                    <span><small class="text-info">Terkumpul</small></span>
                                    <small class="text-dark">Rp.{{ number_format($item->target) }}</small>
                                </div>
                                <div class="col-6 text-right">
                                    <small class="text-dark">Rp.{{ number_format($item->target) }}</small>
                                </div>
                            </div>
                            <p class="card-text"><small>{{ Str::substr($item->description, 0, 70) }}...<span class="text-info">Read more</span> </small></p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection