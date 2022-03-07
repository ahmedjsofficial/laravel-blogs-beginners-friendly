@extends('layouts.app')
@section('title') Create a POST @endsection

@section('content')
{!! Form::open(['action' => 'App\Http\Controllers\Post@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title', 'Title', ['class' => 'form-label fw-bold fs-5']);}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']);}}
</div>
<div class="form-group my-5">
    {{Form::file('cover_image', ['class' => 'form-control'])}}
</div>
<div class="form-group my-5">
    {{Form::label('body', 'Post a Message', ['class' => 'form-label fw-bold fs-5']);}}
    {{Form::textarea('body', '', ['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Your Post Message']);}}
</div>

{{Form::submit('Submit', ['class' => 'btn btn-outline-dark']);}}
{!! Form::close() !!}
@endsection