@extends('layouts.backend')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Edit Writer</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item fa-lg"><a href="{{ route('writer.index') }}">Back</a></li>
        </ul>
    </div>


	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
            		@include('includes.form-error')

        			{!! Form::model($writer, ['method'=>'PATCH', 'action'=>['Admin\AdminWritersController@update', $writer->id], 'files'=>true]) !!}
	                    <div class="mb-3">
	                        <div class="form-group">
	                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                              	{!! Form::text('name', null, ['class'=>'form-control','required' => 'required']) !!}
	                        </div>

	                    </div>

	                    <div class="mb-3">
	                          <div class="form-group">
                          		{!! Html::decode(Form::label('about','About:', ['class' => 'col-form-label'])) !!}
                                {!! Form::textarea('about', null, ['class'=>'form-control', 'rows'=>3]) !!}
	                          </div>
	                    </div>

						<div class="mb-3">
							<div class="form-group">
								<label class="col-form-label">Profile Picture</label>
								<div class="input-group mb-3">
									{!! Form::file('avatar', ['class'=>'form-control']) !!}
									<div class="input-group-append">
										<span class="input-group-text" id="preview-page">Preview</span>
									</div>
								</div>
							</div>
						</div>

	                    <hr class="mb-4">
	                    {!! Form::submit('Update Writer', ['class'=>'btn btn-primary btn-md mb-5']) !!}

	                {{ Form::close() }}
	            </div>
	        </div>
	    </div>
	</div>

@endsection



@section('scripts')
	@include('includes.tinyeditor')

    <script>
		$('#preview-page').click(function(){
			Swal.fire({
				imageUrl: '{{ $writer->avatar }}',
				imageAlt: 'Profile Picture',
				customClass: {
				confirmButton: 'btn btn-primary btn-lg'
				},
				buttonsStyling: false
			});
		});
    </script>
@endsection