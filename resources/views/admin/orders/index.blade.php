@extends('layouts.backend')

@section('content')

    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-shopping-cart fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-orders') }}">Orders</a></li>
        </ul>
    </div>

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
	                    <div class="row">
	                        <div class="col-sm-12">
	                            <table class="table table-hover table-bordered">
	                                <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>OrderId</th>
	                                        <th>Books</th>
	                                        <th>Bill</th>
	                                        <th>Created</th>
	                                        <th>Date</th>
	                                        <th>Aprove</th>
	                                        <th>Pdf</th>
	                                        <th>Delete</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	@php $i = 1; @endphp
	                                    @foreach($orders as $order)
		                                    <tr>
		                                        <td>{{ $i++ }}</td>
		                                        <td><a href="{{ route('admin-order-details', $order->slug) }}">{{ $order->slug }} </a></td>
		                                        <td>{{ $order->books }} </td>
		                                        <td> {{ $order->bill }} TK.</td>
		                                        <td>{{ $order->updated_at->diffForHumans() }}</td>
		                                        <td>{{ $order->created_at->format('m/d/Y') }}</td>
		                                        <td>
													<a class="btn btn-primary btn-sm" href="{{ route('approve', $order->id) }}"><i class="fa fa-check"></i></a>
		                                        </td>
		                                        <td>
													<a class="btn btn-success btn-sm" href="{{ route('pdf', $order->slug) }}"><i class="fa fa-print"></i></a>
		                                        </td>
		                                        <td>
													<a class="btn btn-danger btn-sm" href="{{ route('order-delete', $order->slug) }}"><i class="fa fa-trash"></i></a>
		                                        </td>
		                                    </tr>
	                                    @endforeach
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-12 col-md-5">
	                            <div class="dataTables_info">Showing 1 to 10 of 57 entries</div>
	                        </div>
	                        <div class="col-sm-12 col-md-7">
	                            <div class="dataTables_paginate">
	                            	{{ $orders->render() }}
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection



@section('scripts')
	<script>
		$(document).ready(function(){
			$('#check-all').click(function(){
				if(this.checked){
					$('.checkBoxes').each(function(){
						this.checked = true;
					});
				} 
				else{
					$('.checkBoxes').each(function(){
						this.checked = false;
					});
				}
			});
		});
	</script>
@endsection