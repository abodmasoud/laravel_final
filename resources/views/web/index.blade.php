@extends('web.layout.app')

@section('main-content')

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
        data-image-src="{{ asset('asset_web/img/coverStore1.jpg') }}">
        <form class="d-flex tm-search-form" method="get" action="{{ url('/') }}">
            @csrf
            <input class="form-control tm-search-input" type="search" name="search" value="{{ $search }}"
                placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Store
            </h2>
        </div>
        <div class="row tm-mb-90 tm-gallery">
            @if (count($stores) > 0)
                @foreach ($stores as $store)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                        <figure class="effect-ming tm-video-item">
                            <img src="{{ asset('storage/images/' . $store->image) }}" alt="Image" class="img-fluid">
                            <figcaption class="d-flex align-items-center justify-content-center">
                                <h2>{{ $store->name }}</h2>
                                <a href="{{ route('store.products', $store->id) }}">View more</a>
                            </figcaption>
                        </figure>
                        <div class="d-flex justify-content-between tm-text-gray">
                            <span class="tm-text-gray-light">{{ $store->name }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Data Found</p>
            @endif
        </div>

    @endsection
