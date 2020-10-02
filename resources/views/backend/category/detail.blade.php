@extends('backendtemplate')
@section('title','Category Detail')

@section('content')
  <h1>Category Detail</h1>
  <a href="{{route('category.index')}}" class="btn btn-dark">Back</a>
  <p>Name:{{$category->name}}</p>
@endsection