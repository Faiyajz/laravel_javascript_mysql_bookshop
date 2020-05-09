@extends('layouts.frontend')


@section('content')
	<div class="card">
		<div class="card-body">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-laptop fa-lg"></i></li>
                <li class="breadcrumb-item">Best Sellers Books</li>
            </ul>
    	</div>
	</div>


	<div class="row">
		@foreach($topsellingbooks as $book)
			<div class = 'col-md-3'>
				<div class="book-wrapper text-center">
					<div class="coverpage">
						<img src="{{ $book->cover_page }}"/>
					</div>
					<a href="{{ route('home.writer', $book->writer->slug) }}">{{ $book->writer->name }}</a>
					<a href="{{ route('home.book', $book->slug) }}">{{ $book->name }}</a>
					<div class="rating">
						@if($book->count_rating > 0)
							@include('includes.rating', ['rating' => $book->avg_rating])
							<span class="totalrating">({{ $book->reviews }})</span>
						@endif
					</div>
					<p> 150 TK.</p>
					<button type="submit" class="btn btn-primary"  onclick="addToCart(this)"  data-id='{{$book->id}}' data-name='{{$book->name}}' data-price='{{$book->price}}' data-img='{{$book->cover_page}}'>
						<i class="fa fa-shopping-cart"></i>Add to cart
					</button>
				</div>
			</div>
		@endforeach
	</div>
	<div class="tile">
	    <div class="tile-body">
	        <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

			    <div class="row">
			        <div class="col-sm-12 col-md-5">
			            <div class="dataTables_info">Showing {{ $topsellingbooks->firstItem() }} to {{ $topsellingbooks->lastItem() }} of {{ $topsellingbooks->total() }} entries</div>
			        </div>
			        <div class="col-sm-12 col-md-7">
			            <div class="dataTables_paginate btn-lg">
							{{ $topsellingbooks->render() }}
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
@endsection