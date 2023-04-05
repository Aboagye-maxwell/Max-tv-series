@extends('layouts.blog')
@section('content')
    <a href="/posts/create" class="btn btn-outline-dark pr-5 pl-5 float-right">New Post</a>
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <a href="posts/{{$post->id}}" style="text-decoration: none;">
            <div class="card pb-5">
                <ul class="list-group list-group-flush">

                        <div class="row">
                            <div class="col-4">
                                <img style="width: 100%;" src="/image-u/{{$post->cover_image}}">
                            </div>
                            <div class="col-8">
                                <li class="list-group-item">
                                    <h3>{{$post->title}}</h3>
                                    <small>Written {{$post->created_at->diffForHumans()}}</small>
                                </li>
                            </div>
                        </div>
                </ul>
            </div>
            </a>
        @endforeach


    @endif
@endsection
