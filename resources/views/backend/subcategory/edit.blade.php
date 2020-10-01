@extends('backendtemplate')
@section('title','Edit Subcategory')

@section('content')
  <h1>Edit Subcategory</h1>
  {{-- Error --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Form --}}
  <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="InputCategory">Category:</label>
      <select name="category" class="form-control">
        <optgroup label="Choose Category">
          @foreach($category as $row)
          <option value="{{$row->id}}" 
            @if($row->id == $subcategory->category_id)
            {{'selected'}}
            @endif
            >{{$row->name}}</option>
          @endforeach
        </optgroup>
      </select>
    </div>

    

    <div class="form-group">
      <label for="InputName">Name:</label>
      <input type="text" name="name" class="form-control" id="InputName" value="{{$subcategory->name}}">
    </div>
   

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection