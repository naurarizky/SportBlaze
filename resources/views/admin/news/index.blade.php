@extends('layouts.admin')

@section('content')


<div class="row mx-4 mt-4">
    <div class="col-md-12 grid-margin">

        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
       
        @if(session('messages'))
        <div class="alert alert-danger">{{session('messages')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>News Content
                    <a href="{{ route('news-create')}}" class="btn btn-primary btn-sm text-white float-end">
                        Add News
                    </a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Small Description</th>
                            <th>Writer</th>
                            <th>Date</th>
                            <th>Trending</th>
                            <th>Top</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($news as $newsItem)
                        <tr>
                            <td>
                            <img src="{{ asset("$newsItem->image") }}" style="width: 90px; height: 50px" alt="img">
                            </td>
                            <td>{{$newsItem->title}}</td>
                            <td>{{$newsItem->small_description}}</td>
                            <td>{{$newsItem->writer}}</td>
                            <td>{{$newsItem->tanggal}}</td>
                            <td>{{$newsItem->trending == '1' ? 'Trending':'Not-Trending'}}</td>
                            <td>{{$newsItem->top == '1' ? 'Top':'Not-Top'}}</td>
                            <td>{{$newsItem->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{ route('news-edit', $newsItem->id) }}" class="btn btn-success btn-sm mb-3">Edit</a>
                                <a href="{{ route('news-delete', $newsItem->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No News Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection