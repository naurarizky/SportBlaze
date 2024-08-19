@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section card-text">
  <div class="container align-items-center text-white flex-column position-relative text-card">
    <div class="white-rectangle">
      <div class="trending-box d-flex justify-content-around">
        <div class="row container ">
        <div class="col-12 col-lg-6">
            <img src="{{ asset($topNews->image) }}" class="rounded" alt="{{ $topNews->title }}">
          </div>
          <div class="col-12 col-lg-6 d-flex justify-content-center ">
            <div class="">
              <p class="text-dark">{{ $topNews->writer }}</p>
              <p class="text-dark p-tanggal">{{ $topNews->tanggal }}</p>
              <h1 class="text-dark ">{{ $topNews->title }}</h1>
              <p class="text-dark ">{{ $topNews->small_description }}</p>
              <hr class="border border-success border-2 opacity-50  line">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- End Hero Section -->

<!-- Trending Section -->
<section id="trending-section ">
    <div class="container h-100 d-flex flex-column align-items-center justify-content-center pt-5 pb-5">
        <div class="row mt-5 w-75 align-items-center justify-content-center">
            @foreach ($trendingNews as $trending)
            <div class="col-md-6 text-left">
                <div class="position-relative w-75 mx-auto">
                    <img class="rounded img-trending" src="{{ asset($trending->image) }}" alt="">
                    <h1 class="text-dark h3 text-bold mt-4 fw-bolder">{{ $trending->title }}</h1>
                    <hr class="border border-secondary border-1 opacity-50 line-trending">
                    <div class="d-flex ">
                        <p class="me-2 text-card">{{ $trending->likes }} likes</p>
                        <p>{{ $trending->comments }} comments</p>
                        <box-icon class="like" name='heart' animation='tada' color='#726e6e'></box-icon>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Trending Section -->

<!-- Section Slide -->
<section class="section-slide vh-fix">
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
        @foreach($sliders as $key => $sliderItem)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{asset("$sliderItem->image")}}" class="d-block w-100" alt="...">
            

            <div class="carousel-caption  d-flex align-items-center justify-content-center">
                <div class="custom-carousel-content ">
                    <h1 class="d-flex align-items-center justify-content-center">
                        {{$sliderItem->title}}
                    </h1>
                    <p>
                        {{$sliderItem->description}}
                    </p>
                    <div>
                        <a href="#" class="btn btn-slider d-flex align-items-center justify-content-center">
                            Read News
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</section>
<!-- Section Slide -->

<!-- Recent Section -->
<section class="recent-section vh-fix d-flex align-items-center justify-content-center mt-5">
    <div class="align-items-center justify-content-center">
        @foreach ($news as $newsItem)
            <div class="card mb-4" style="max-width: 900px;">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset($newsItem->image) }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('show', $newsItem->id) }}">{{ $newsItem->title }}</a>
                            </h5>
                            <p class="card-text">{{ $newsItem->small_description }}</p>
                            <p class="card-text"><small class="text-muted">Last updated {{ $newsItem->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- End Recent Section -->

@endsection