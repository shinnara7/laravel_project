@extends('backendtemplate')
@section('title','Category List')

@section('content')
  <h1>Category List</h1>
  <a href="{{route('category.create')}}" class="btn btn-outline-success btn-sm">Add New Category</a>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  	<thead>
  		<tr>
  			<th>No</th>
  			<th>Name</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	@foreach($category as $row)
  	<tbody>
  		<tr>
  			<td>{{$row->id}}</td>
  			<td>{{$row->name}}</td>
  			<td>
  				<a href="{{route('category.show',$row->id)}}" class="btn btn-info">Detail</a>
  				<a href="{{route('category.edit',$row->id)}}" class="btn btn-warning">Edit</a>
  				<form method="post" action="{{route('category.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
  					@csrf
  					@method('DELETE')
  					<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
  				</form>
  			</td>
  		</tr>
  		@endforeach
  	</tbody>
  </table>
@endsection