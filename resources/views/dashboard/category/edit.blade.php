@extends('dashboard.layout')
@section('content')
    <h2>Actualizar category: {{$category->title}}</h2>
    
    @include('dashboard.fragment._errors-form')
    
    <form action="{{route('category.update',$category->id) }}" method="post">
       @method("PATCH")
       @include('dashboard.category._form',["task"=>"edit"])          
    </form>
    
@endsection