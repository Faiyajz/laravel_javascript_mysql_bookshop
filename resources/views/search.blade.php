@extends('layouts.frontend')

@section('content')

	@if($flag)
		@include('includes.book')
	@else
		<div class="card">
			<div class="card-body">
		        <ul class="app-breadcrumb breadcrumb">
		            <li class="breadcrumb-item"><i class="fa fa-search"></i></li>
		            <li class="breadcrumb-item">Search</li>
		            <li class="breadcrumb-item text-primary">{{ request()->input('search') }}</li>
		        </ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="cart_info table-responsive">
				    <table class="table">
				        <thead class="text-center">
				            <tr>
				                <th>#</th>
				                <th>Cover</th>
				                <th>Name</th>
				                <th>Writer</th>
				                <th>Price</th>
				            </tr>
				        </thead>
				        <tbody class="text-center">
				        	@php $cnt = 1; @endphp
							@foreach($books as $book)
			           		 <tr>
			           		 	<td>{{ $cnt++ }}</td>
				                <td class="cart_coverpage"><img src="{{ $book->cover_page }}"></td>
				                <td><a href="{{ route('home.book', $book->slug) }}">{{ $book->name }}</a></td>
				                <td><a href="{{ route('home.writer', $book->writer->slug) }}">{{ $book->writer->name }}</a></td>
				                <td id="10">{{ $book->price }}TK.</td>
				            </tr>
				            @endforeach
				        </tbody>
				    </table>
				</div>
			</div>
		</div> 

		<div class="tile">
		    <div class="tile-body">
		        <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

				    <div class="row">
				        <div class="col-sm-12 col-md-5">
				            <div class="dataTables_info">Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} entries</div>
				        </div>
				        <div class="col-sm-12 col-md-7">
				            <div class="dataTables_paginate btn-lg">
								{{ $books->render() }}
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
			
	@endif

@endsection

@if($flag)
	@section('scripts')
		<script type="text/javascript">
			$(document).ready(function(){
				$('.book-coverphoto').click(function(){
					Swal.fire({
						imageUrl: '{{ $book->preview_page }}',
						imageAlt: 'Preview',
						customClass: {
						confirmButton: 'btn btn-primary btn-lg'
						},
						buttonsStyling: false
					});
				}); 	
			});
		</script>
	@endsection
@endif
