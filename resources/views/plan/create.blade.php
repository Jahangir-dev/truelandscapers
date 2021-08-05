@extends('layouts.app')

@section('content')
	<div class="row mt-5 mb-5 mr-0">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4>Create Plan</h4>
                </div>
                <div class="card-body">
                	@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
					@endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                            Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <form method="POST" action="{{ route('plan.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Title : <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Price : <span class="text-danger">*</span></label>
                            <input type="number" name="monthly_price" class="form-control" >
                            @if ($errors->has('monthly_price'))
                                <span class="text-danger">{{ $errors->first('monthly_price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Features : <span class="text-danger">*</span><sub>(Add comma seprated values)</sub></label>
                            <br>
                            <input type="text" name="features" class="form-control">
                            <br>
                            @if ($errors->has('features'))
                                <span class="text-danger">{{ $errors->first('features') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success store-data btn-sm">Save</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection