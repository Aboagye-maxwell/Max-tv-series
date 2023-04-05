@extends('layouts.app')

@section('content')

    <h1>Add New Season</h1>
    {!! Form::open(['route' => 'seasons.store','method' => 'POST']) !!}

    <div class="form-group">
        {{Form::label('title','Series Name')}}
        {{Form::text('name','',['class' => 'form-control','placeholder' => 'eg   gotham'])}}
    </div>

    <div class="form-group">
        {{Form::label('title','Season Number')}}
        {{Form::text('number','',['class' => 'form-control','placeholder' => 'eg   01'])}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-success'])}}

    {!! Form::close() !!}

@endsection
