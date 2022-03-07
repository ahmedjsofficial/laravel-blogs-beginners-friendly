@extends('layouts.app')
@section('title') Blog Detail @endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h1 class="fs-5 fw-bold text-success">Posted by:- {{$posts->user->name}}</h1>
        <h6 class="text-danger">Created at: {{$posts->created_at}}</h6>
    </div>
    <div class="card-img d-flex align-items-center justify-content-center">
        <img src="/storage/cover_image/{{$posts->cover_image}}" alt="cover_img" class="img-fluid" />
    </div>
    <div class="card-body py-5">
        <h5 class="card-title text-primary fw-bold fs-1">{{$posts->title}}</h5>
        <p class="card-text fs-3 text-dark">{!!$posts->body!!}</p>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-between">
        <a href="/posts" class="btn btn-outline-dark">Back to Posts</a>

        @if(!Auth::guest())
        @if(Auth::user()->id == $posts->user_id)
        <div class="d-flex align-items-center justify-content-center">
            <a href="/posts/{{$posts->id}}/edit" class="btn btn-outline-dark me-4">Edit</a>
            {!! Form::open(['action' => ['App\Http\Controllers\Post@destroy', $posts->id], 'method' => 'POST']) !!}
            {!!Form::hidden('_method', 'DELETE')!!}
            {!!Form::submit('DELETE', ['class' => 'btn btn-outline-danger'])!!}
            {!!Form::close()!!}
        </div>
        @endif
        @endif
    </div>
</div>

@endsection