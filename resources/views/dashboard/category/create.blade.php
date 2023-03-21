@extends('dashboard.layout')
@section('content')
    <h2>Crear post dc1</h2>
    
    @include('dashboard.fragment._errors-form')
    
    <form action="{{ route('category.store') }}" method="post">
       @include('dashboard.category._form')        
    </form>
    
@endsection

