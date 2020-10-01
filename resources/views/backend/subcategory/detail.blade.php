@extends('backendtemplate')
@section('title','Subcategories Detail')

@section('content')
	<h1>Subcategories Detail</h1>
	<a href="{{route('subcategory.index')}}">Back</a>
	
	<p>Name:{{$subcategory->name}}</p>
	<p>Category Name:{{$subcategory->category->name}}</p>
	
@endsection