@extends('backendtemplate')
@section('title','Brand Detail')

@section('content')
  <h1>Brand Detail</h1>
  <a href="{{route('brand.index')}}" class="btn btn-dark">Back</a>
  
  <img src="{{asset($brand->logo)}}" alt="Brand Logo">

  <p>Name:{{$brand->name}}</p>

@endsection