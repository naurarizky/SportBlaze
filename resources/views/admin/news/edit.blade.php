@extends('layouts.admin')

@section('content')

<div class="row mt-4 mx-4">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Edit News
                    <a href="{{ route('news-index')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('news-update', $news->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control mb-2">
                        <img src="{{ asset("$news->image") }}" style="width: 90px; height: 50px" alt="img">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$news->title}}">
                        @error('title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="small_description">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="4">{{$news->small_description}}</textarea>
                        @error('small_description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{$news->description}}</textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="writer">Writer</label>
                        <input type="text" name="writer" class="form-control" value="{{$news->writer}}">
                        @error('writer') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{$news->tanggal}}">
                        @error('tanggal') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label><br>
                        <input type="checkbox" name="trending" style="width: 30px; height: 30px" {{ $news->trending == '1' ? 'checked': '' }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="top">Top</label><br>
                        <input type="checkbox" name="top" style="width: 30px; height: 30px" {{ $news->top == '1' ? 'checked': '' }}>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label><br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px" {{ $news->status == '1' ? 'checked': '' }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
