@extends('layouts.app')

@section('content')
      <h1>{{$title}}</h1>
      @if(count($sub) > 0)
      <ul>
        @foreach ($sub as $service)
          <li>{{$service}}</li>
        @endforeach
      </ul>
      @endif
@endsection
