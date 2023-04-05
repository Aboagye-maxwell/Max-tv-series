@extends('layouts.app')

@section('content')
    <h1>Add New Series</h1>
        {!! Form::open(['route' => 'series.store','method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('series_name','Name')}}
        {{Form::text('series_name','',['class' => 'form-control','placeholder' => 'eg gotham'])}}
    </div>

    <div class="form-group">
        {{Form::label('recent','For Cover')}}
        {{Form::text('recent','',['class' => 'form-control','placeholder' => 'eg 1 for yes or 0 for no'])}}
    </div>

    <div class="form-group">
        {{Form::label('body','Description')}}
        {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Description'])}}
    </div>

    <div class="form-group">
        {{Form::label('genres','Genres')}}
        {{Form::text('genres','',['class' => 'form-control','placeholder' => 'eg Sci Fi | Tiller'])}}
    </div>

    <div class="form-group">
        {{Form::label('language','Language')}}
        {{Form::text('language','',['class' => 'form-control','placeholder' => 'eg English'])}}
    </div>

    <div class="form-group">
        {{Form::label('resolution','Resolution')}}
        {{Form::text('resolution','',['class' => 'form-control','placeholder' => 'eg 480'])}}
    </div>

    <div class="form-group">
        {{Form::label('size','Estimated Episodes Size')}}
        {{Form::text('size','',['class' => 'form-control','placeholder' => 'eg 2.3MB'])}}
    </div>

    <div class="form-group">
        {{Form::label('rating','Imdb Rating')}}
        {{Form::text('rating','',['class' => 'form-control','placeholder' => 'eg 5 stars'])}}
    </div>

    <div class="form-group">
        {{Form::label('cover_image','Cover_image')}}
        {{Form::file('cover_image')}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-success'])}}

    {!! Form::close() !!}

@endsection
