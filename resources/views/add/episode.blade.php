@extends('layouts.app')

@section('content')

    <h1>Add New Episode</h1>
    {!! Form::open(['route' => 'episodes.store','method' => 'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        {{Form::label('title','Series Name')}}
        {{Form::text('name','',['class' => 'form-control','placeholder' => 'eg gotham'])}}
    </div>

    <div class="form-group">
        {{Form::label('title','Season Number')}}
        {{Form::text('title','',['class' => 'form-control','placeholder' => 'eg   01'])}}
    </div>

    <div class="form-group">
        {{Form::label('episode','Episode Number')}}
        {{Form::text('episode','',['class' => 'form-control','placeholder' => 'eg   01'])}}
    </div>

    <div class="form-group">
        {{Form::label('Movie Path','Movie Path')}}
        {{Form::file('movie')}}
    </div>


    {{Form::submit('Submit',['class' => 'btn btn-success'])}}

    {!! Form::close() !!}
@endsection
