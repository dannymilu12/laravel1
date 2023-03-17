@extends('dashboard.layout')
@section('content')
    <h2>Crear post dc1</h2>
    
    @include('dashboard.fragment._errors-form')
    
    <form action="{{ route('post.store') }}" method="post">
       @include('dashboard.post._form')        
    </form>
    
@endsection

