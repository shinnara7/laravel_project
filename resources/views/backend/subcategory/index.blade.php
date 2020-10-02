@extends('backendtemplate')
@section('title','Subcategory List')

@section('content')
  <h1>Subcategory List</h1>
  <a href="{{route('subcategory.create')}}" class="btn btn-outline-success btn-sm">Add New Subcategory</a>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  	<thead>
  		<tr>
  			<th>No</th>
  			<th>Name</th>
        <th>Category</th>
  			<th>Actions</th>
  		</tr>
  	</thead>
  	@foreach($subcategory as $row)
  	<tbody>
  		<tr>
  			<td>{{$row->id}}</td>
  			<td>{{$row->name}}</td>
        <td>{{$row->category_id}}</td>
  			<td>
  				<a href="{{route('subcategory.show',$row->id)}}" class="btn btn-info">Detail</a>
  				<a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-warning">Edit</a>
  				<form method="post" action="{{route('subcategory.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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