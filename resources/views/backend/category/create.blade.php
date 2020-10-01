@extends('backendtemplate')
@section('title','Category Create ')

@section('content')
  <h1>Category Create</h1>
  {{--Error--}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  {{--form--}}

  <form method="post" action="{{route('category.store')}}" enctype="mutlipart/form-data">
  	@csrf
  	<div class="form-group">
    <label for="InputName">Name:</label>
    <input type="text" name="name" class="form-control" id="InputName">
    
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection