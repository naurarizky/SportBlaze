@extends('layouts.admin')

@section('content')

<div class="row mt-4 mx-4">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Add News
                    <a href="{{ route('news-index')}}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('news-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="4"></textarea>
                        @error('small_description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="15"></textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Writer</label>
                        <input type="text" name="writer" class="form-control">
                        @error('writer') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                        @error('tanggal') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label><br>
                        <input type="checkbox" name="trending" style="width: 30px; height: 30px">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Top</label><br>
                        <input type="checkbox" name="top" style="width: 30px; height: 30px">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px">
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection