@extends('dashboard.layout')
@section('content')
    <h2>Actualizar post: {{$post->title}}</h2>
    
    @include('dashboard.fragment._errors-form')
    
    <form action="{{route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
       @method("PATCH")
       @include('dashboard.post._form',["task"=>"edit"])          
    </form>
    
@endsection