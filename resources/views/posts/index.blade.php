@extends('layouts.app')

@section('title') Laravel Blogs @endsection
@section('content')
@if(count(['$posts']) > 0)
    <div class="row gy-4">
        @foreach($posts as $val)
            <div class="col-lg-4 col-md-6 mx-lg-auto mx-md-auto mx-sm-auto mx-auto">
                <div class="card border border-dark">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <span class="text-danger fw-bold fs-6">Posted by: {{$val->user->name}}</span>
                        <span class="text-success fw-bold" style="font-size: 0.8rem;">Created at: {{$val->created_at}}</span>
                    </div>
                    <div class="card-img d-flex align-items-center justify-content-center">
                        <img src="/storage/cover_image/{{$val->cover_image}}" alt="cover_img" class="img-fluid" />
                    </div>
                    <div class="card-body">
                        <h1 class="card-title text-black">{{$val->title}}</h1>
                        <p class="card-text text-black text-truncate">{{$val->body}}</p>
                        <a href="/posts/{{$val->id}}" class="btn btn-outline-danger btn-sm">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Posts Not Found</p>
@endif

@endsection