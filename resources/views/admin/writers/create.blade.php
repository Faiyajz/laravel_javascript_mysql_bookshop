@extends('layouts.backend')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Add Writer</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
            <li class="breadcrumb-item">writer</li>
            <li class="breadcrumb-item"><a href="{{ route('writer.create') }}">Add</a></li>
        </ul>
    </div>


	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
            		@include('includes.form-error')
					  @if(Session::has('writer_added'))
					    <div class="alert alert-success" role="alert">
					      {{session('writer_added')}}
					    </div>
					  @endif

	                {!! Form::open(['action'=>'Admin\AdminWritersController@store', 'files'=>true]) !!}
	                    <div class="mb-3">
	                        <div class="form-group">
	                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                              	{!! Form::text('name', null, ['class'=>'form-control','required' => 'required']) !!}
	                        </div>

	                    </div>

	                    <div class="mb-3">
	                          <div class="form-group">
                          		{!! Html::decode(Form::label('about','About: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                                {!! Form::textarea('about', null, ['class'=>'form-control', 'rows'=>3]) !!}
	                          </div>
	                    </div>

                        <div class="cmb-3">
                          <div class="form-group">
								{!! Html::decode(Form::label('avatar','Profile Picture: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                            	{!! Form::file('avatar', ['class'=>'form-control']) !!}
                          </div>
                        </div>

	                    <hr class="mb-4">
	                    {!! Form::submit('Add Writer', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                {{ Form::close() }}
	            </div>
	        </div>
	    </div>
	</div>

@endsection



@section('scripts')
	@include('includes.tinyeditor')
@endsection