@extends('backendtemplate')
@section('title','Category Edit ')

@section('content')
  <h1>Editing the existing Category</h1>
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

  <form method="post" action="{{route('category.update',$category->id)}}" enctype="mutlipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="InputName">Name:</label>
    <input type="text" name="name" class="form-control" id="InputName" value="{{$category->name}}">
    
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection