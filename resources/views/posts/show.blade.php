@extends('layouts.blog')
@section('content')
    @include('posts.modal')
    <a class="btn btn-outline-dark pl-5 pr-5 float-right" href="/posts">Go Back</a>
    @if($post->count() > 0)
        <h1 class="pt-4">{{$post->title}}</h1>
        <div class="col">
            <img style="width: 100%;" src="/image-u/{{$post->cover_image}}">
        </div>
        <p>{{$post->body}}</p>
        <hr>
        <small>written {{$post->created_at->diffForHumans()}}</small><br><br>
        @if(!\Illuminate\Support\Facades\Auth::guest())
            @if(\Illuminate\Support\Facades\Auth::user()->id == $post->user_id)
                <div class="d-flex">
            <span class="pr-2">
                <a class="btn btn-outline-primary pl-5 pr-5 " href="/posts/{{$post->id}}/edit">Edit</a>
            </span>
                    <span class="">
                <a class="btn btn-outline-danger pl-5 pr-5 " data-toggle="modal" data-target="#myModal">Delete</a>
            </span>
        </div>
            @endif
        @endif
    @endif
@endsection
