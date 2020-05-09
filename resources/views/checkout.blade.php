@extends('layouts.frontend')

@section('content')
	<div class="row">
		<div class="col-md-8 cart_info">
		    <h4 class="mb-3 mt-3">Checkout</h4>
		    @include('includes.form-error')
		    {!! Form::open(['action'=>'OrderController@store']) !!}
		        <div class="row">
                    <div class="col-md mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('name','Name: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                          	{!! Form::text('name', $user->name, ['class'=>'form-control','required' => 'required']) !!}
                        </div>

                    </div>
		            <div class="col-md-6 mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('email','Email: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                          	{!! Form::email('email', $user->email, ['class'=>'form-control','required' => 'required']) !!}
                        </div>

		            </div>
		        </div>
                <div class="mb-3">
                    <div class="form-group">
                        {!! Html::decode(Form::label('phone_no','Phone: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                      	{!! Form::text('phone_no', $user->phone, ['class'=>'form-control','required' => 'required']) !!}
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        {!! Html::decode(Form::label('address','Address: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                      	{!! Form::text('address', $user->address, ['class'=>'form-control','required' => 'required']) !!}
                    </div>
                </div>
		        <div class="row">
                    <div class="col-md-5 mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('division','Division: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                            {!! Form::select('division', [''=>'Choose  Option'] + $divisions, $user->division, ['class'=>'select form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            {!! Html::decode(Form::label('district','District: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
                            {!! Form::select('district', [''=>'Choose  Option'] + $districts, $user->district, ['class'=>'select form-control', 'required' => 'required']) !!}
                        </div>
                    </div>
		            <div class="col-md-3 mb-3">
	                    <div class="form-group">
	                        {!! Html::decode(Form::label('zip_code','Zip Code: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                      	{!! Form::text('zip_code', $user->zip_code, ['class'=>'form-control','required' => 'required']) !!}
	                    </div>
		            </div>
		        </div>
		        <hr class="mb-4">
		        <div class="d-block my-3">
		            <div class="form-group">
		                <label class="col-form-label">
		                    Payment method<span class="mustfillup">*</span>
		                </label>

						<div class="animated-radio-button">
							<label for="payment1">
								<input type="radio" name="payment_method" id="payment1" value="Bkash"><span class="label-text">Bkash</span>
							</label>
						</div>

						<div class="animated-radio-button">
							<label for="payment2">
								<input type="radio" name="payment_method" id="payment2" value="Rocket"><span class="label-text">Rocket</span>
							</label>
						</div>

		            </div>

		        </div>
		        <div class="row">
		            <div class="col-md-6 mb-3">
	                    <div class="form-group">
	                        {!! Html::decode(Form::label('payment_id','Account No: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                      	{!! Form::text('payment_id', null, ['class'=>'form-control','required' => 'required']) !!}
	                    </div>

		            </div>
		            <div class="col-md-6 mb-3">
	                    <div class="form-group">
	                        {!! Html::decode(Form::label('transaction_id','Transaction ID: <span class="mustfillup">*</span>', ['class' => 'col-form-label'])) !!}
	                      	{!! Form::number('transaction_id', null, ['class'=>'form-control','required' => 'required']) !!}
	                    </div>
		            </div>
		        </div>
		        <hr class="mb-4">
		        {!! Form::submit('Checkout', ['class'=>'btn btn-primary btn-block mb-4']) !!}

		   {{ Form::close() }}
		</div>


		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center"><h4>Checkout Summary</h4></li>
				<li class="list-group-item d-flex justify-content-between align-items-center">Books<span>{{ Cart::count() }}</span></li>
				<li class="list-group-item d-flex justify-content-between align-items-center">Subtotal<span>{{ Cart::subtotal() }} TK.</span></li>
				<li class="list-group-item d-flex justify-content-between align-items-center">Payable Total<span>{{ Cart::total() }} TK.</span></li>
			</ul>
		</div>

	</div>
@endsection


@section('scripts')
    <script type="text/javascript">

      $('#payment1').click(function(){
      	Swal.fire({
      		title: "Bkash Number",
      		text: "01929578348",
			  customClass: {
			    confirmButton: 'btn btn-primary btn-lg',
			  },
			  buttonsStyling: false
      	});
      });

      $('#payment2').click(function(){
      	Swal.fire({
      		title: "Rocket Number",
      		text: "01929578348",
			  customClass: {
			    confirmButton: 'btn btn-primary btn-lg',
			  },
			  buttonsStyling: false

      	});
      });
    </script>
@endsection
