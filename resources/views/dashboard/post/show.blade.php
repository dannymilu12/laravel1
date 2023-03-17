@extends('dashboard.layout')
@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->description}}</p>
    <p>{{$post->posted}}</p>
    <div>{{$post->content}}</div>    
@endsection