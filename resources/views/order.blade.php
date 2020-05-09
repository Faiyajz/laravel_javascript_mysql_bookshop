@extends('layouts.frontend')

@section('content')
	<div class="cart_info table-responsive">
		@if(count($user->order) > 0)
		    <table class="table table-hover">
		        <thead class="text-center">
		            <tr>
		                <th>#</th>
		                <th>Order ID</th>
		                <th>Payment</th>
		                <th>Books</th>
		                <th>Status</th>
		                <th>Date</th>
		            </tr>
		        </thead>
		        <tbody class="text-center">	
					@foreach($user->order as $ord)
		            <tr>
		                <td>1</td>
		                <td><a href="{{ route('order-details', $ord->slug) }}">{{ $ord->slug }} </a></td>
		                <td>{{ $ord->bill}} Tk.</td>
		                <td>{{ $ord->books }}</td>
		                <td>Processing</td>
		                <td>{{ $ord->created_at->format('m/d/Y') }}</td>
		            </tr>
					@endforeach
		        	
		        </tbody>
		    </table>
	    @else
	    	<h1 class="mt-5 mb-5 text-center text-primary"> Empty </h1>

    	@endif
	</div>
@endsection

@section('footer')
	@include('includes.footer')
@endsection