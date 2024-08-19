@extends('layouts.app')

@section('content')
<section>
    <div class="container-fluid px-0">
        <div class="div-img">
            <img src="{{ asset($newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid w-100">
        </div>
    </div>
    <div class="container">
        <h1 class="hasatu text-center mt-4">{{ $newsItem->title }}</h1>

        <div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
            <div class="me-3">
                <img src="{{ asset('assets/image/profile-1.png') }}" alt="Author" width="40" height="40" class="rounded-circle">
            </div>
            <div>
                <p class="mb-0"><strong>By {{ $newsItem->writer }}</strong></p>
                <p class="mb-0 text-muted">{{ \Carbon\Carbon::parse($newsItem->tanggal)->format('M. d, Y') }}</p>
            </div>
        </div>

        <h4 class="h4">{{ $newsItem->title }}</h4>

        <div class="divisilagi">
            {!! nl2br(e($newsItem->description)) !!}
        </div>

        <div class="divimg text-center mb-5">
            <img src="{{ asset('images/imgdlmdetail.png') }}" alt="" class="img-fluid">
        </div>
    </div>
</section>
@endsection