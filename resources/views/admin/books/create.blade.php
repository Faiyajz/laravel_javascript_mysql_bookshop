@extends('layouts.backend')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-book"></i> Add New Book</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard fa-lg"></i></li>
            <li class="breadcrumb-item">Book</li>
            <li class="breadcrumb-item"><a href="{{ route('book.create') }}">Add</a></li>
        </ul>
    </div>


	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
            		@include('includes.form-error')
					  @if(Session::has('book_added'))
					    <div class="alert alert-success" role="alert">
					      {{session('book_added')}}
					    </div>
					  @endif

	                {!! Form::open(['action'=>'Admin\AdminBooksController@store', 'files'=>true]) !!}
	                    <div class="mb-3">
	                        <div class="form-group">
	                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                              	{!! Form::text('name', null, ['class'=>'form-control','required' => 'required']) !!}
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-5 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('writer','Writer: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::select('writer_id', [''=>'Choose  Option'] + $writers, null, ['class'=>'select form-control', 'required' => 'required']) !!}
	                            </div>
	                        </div>
	                        <div class="col-md-4 mb-3">
	                            <div class="form-group">
	                                {!! Html::decode(Form::label('category','Category: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::select('category_id', [''=>'Choose  Option'] + $categories, null, ['class'=>'select form-control', 'required' => 'required']) !!}
	                            </div>
	                        </div>
	                        <div class="col-md-3 mb-3">
	                            <div class="form-group">
		                            {!! Html::decode(Form::label('price','Price: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                              	{!! Form::text('price', null, ['class'=>'form-control','required' => 'required']) !!}
	                            </div>

	                        </div>
	                    </div>
	                    <div class="mb-3">
	                          <div class="form-group">
                              		{!! Html::decode(Form::label('description','Description: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
	                          </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-6 mb-3">
	                          <div class="form-group">
									{!! Html::decode(Form::label('cover_page','Cover Page: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                                {!! Form::file('cover_page', ['class'=>'form-control', 'required' => 'required']) !!}
	                          </div>

	                        </div>
	                        <div class="col-md-6 mb-3">
	                          <div class="form-group">
									{!! Html::decode(Form::label('preview_page','Preview Page: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                            	{!! Form::file('preview_page', ['class'=>'form-control','required' => 'required']) !!}
	                          </div>

	                        </div>
	                    </div>

	                    <hr class="mb-4">
	                    {!! Form::submit('Add New Book', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                {{ Form::close() }}
	            </div>
	        </div>
	    </div>
	</div>

@endsection


@section('scripts')
	@include('includes.tinyeditor')
@endsection