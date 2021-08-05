@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<a href="{{route('plan.create')}}" class="btn btn-primary">Create Plan</a>
			</div>
		</div>
		<br>
	<h1>All the Plans</h1>
		<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered mt-5">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Price</td>
            <td>Features</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($plans as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->monthly_price }}</td>
            <td>{{ $value->features }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

               <a class="btn btn-small btn-info" href="{{ URL::to('plan/' . $value->id . '/delete') }}">Delete</a>

                
                <a class="btn btn-small btn-info" href="{{ URL::to('plan/' . $value->id . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

	</div>
	
@endsection