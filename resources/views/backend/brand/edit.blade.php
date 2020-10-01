@extends('backendtemplate')
@section('title','Brand Edit')

@section('content')
  <h1>Brand Edit</h1>
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
  <form method="post" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="InputName">Name:</label>
      <input type="text"name="name" class="form-control" id="Inputname" value="{{$brand->name}}" > 
    </div>

    <div class="form-group">
      <label for="Inputlogo">Logo:</label>
      <input type="file" name="logo" class="form-control" id="Inputlogo" >
      <img src="{{asset($brand->logo)}}" alt="Brand Logo"> 
      <input type="hidden" name="oldlogo" value="{{$brand->logo}}"> 
    </div>

    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection