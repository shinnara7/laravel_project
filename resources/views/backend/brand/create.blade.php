@extends('backendtemplate')
@section('title','Brand Create')

@section('content')
	<h1>Brand create</h1>
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
	<form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="InputName">Name:</label>
			<input type="text"name="name" class="form-control" id="Inputname" >	
		</div>

		<div class="form-group">
			<label for="Inputlogo">Logo:</label>
			<input type="file" name="logo" class="form-control" id="Inputlogo" >	
		</div>

		
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
@endsection