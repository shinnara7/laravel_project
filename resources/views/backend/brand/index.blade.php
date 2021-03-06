@extends('backendtemplate')
@section('title','Brand List')

@section('content')
  <h1>Brand List</h1>
  <a href="{{route('brand.create')}}" class="btn btn-outline-success btn-sm">Add New Brand</a>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  	<thead>
  		<tr>
  			<th>No</th>
  			<th>Name</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	@foreach($brand as $row)
  	<tbody>
  		<tr>
  			<td>{{$row->id}}</td>
  			<td>{{$row->name}}</td>
  			<td>
  				<a href="{{route('brand.show',$row->id)}}" class="btn btn-info">Detail
          </a>
  				<a href="{{route('brand.edit',$row->id)}}" class="btn btn-warning">
                        Edit</a>
  				<form method="post" action="{{route('brand.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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