@extends('layouts.frontend')

@section('content')
	<div class="row">
	<div class="col-md-8">
		<div class="cart_info table-responsive">
		    <table class="table">
		        <thead class="text-center">
		            <tr>
		                <th>#</th>
		                <th>Name</th>
		                <th>Qty</th>
		                <th>Price</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody class="text-center">
	        	@if(Cart::count())

					@foreach(Cart::content() as $book)
	           		 <tr>
		                <td class="cart_coverpage"><img src="{{ $book->options->img }}"></td>
		                <td>{{ $book->name }}</td>
		                <td>
		                	<select onchange ="updateCartItem(this)" data-id="{{ $book->rowId }}">
		                		@for($i = 1; $i < 9; $i++)
		                			<option {{ $book->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
		                		@endfor
		                	</select>
		                </td>
		                <td id="10">{{ $book->price }}TK.</td>
		                <td>
						{!! Form::open(['method'=>'DELETE', 'action'=>['CartController@destroy', $book->rowId]]) !!}
				    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}

						{!! Form::close() !!}
						</td>
		            </tr>
		            @endforeach
	            @endif
		        </tbody>
		    </table>
		    @if(Cart::count())
				<div class="continue_or_next text-center">
					<a href="{{ route('home')}}" class="btn btn-success mb-3">Continue Shopping</a>
					<a href="{{ route('checkout') }}" class="btn btn-warning mb-3">Proceed to Checkout</a>
				</div>
			@else
				<h1 class="mt-5 mb-5 text-primary text-center">Cart Empty </h1>

			@endif
		</div>
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
	<script>
		function updateCartItem(obj){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "/cart/update",
                data: {'id': obj.getAttribute('data-id'), 'qty' : obj.value},
                success: function(response) {
                    window.location.reload();
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
		}
	</script>

@endsection
