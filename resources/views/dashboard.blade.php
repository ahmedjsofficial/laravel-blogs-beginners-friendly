@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="mt-2 mb-5">
                        <a href="/posts/create" class="btn bg-black text-white btn-lg">Create a Post</a>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (count(['$posts']) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>User</th>
                            </tr>
                            @foreach($posts as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->title}}</td>
                                    <td>{{$val->user->name}}</td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <p class="test-danger text-center fs-4">You have no Posts</p>
                    @endif

                    <div class="mt-5">
                        <a href="/posts" class="btn btn-outline-dark">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection