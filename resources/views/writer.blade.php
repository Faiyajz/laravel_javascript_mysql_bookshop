@extends('layouts.frontend')


@section('preloader')
    <div class="pre_loader gray_bg text-center">
        <div class="loader">
            <div><div><div><div></div></div></div></div>
        </div>
    </div>
@endsection


@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="writer-photo">
				<img src="{{ $writer->avatar }}" class="rounded mx-auto d-block">
			</div>			
		</div>
		<div class="col-md-8">
			<div class="writer-information">
				<h3>{{ $writer->name }}</h3>
				<article class="text-justify">{!! $writer->about !!}</article>

			</div>
		</div>
	</div>								
	<div class="book-section-1">
		<div class="home-title">
			<h3 class="text-center">Published Book</h3>
		</div>

		@if($writer->books)
			<div class="responsive">
				@foreach($writer->books as $book)
					<div class="book-wrapper text-center">
						<div class="coverpage">
							<img src="{{ $book->cover_page }}"/>
						</div>
						<a href="{{ route('home.book', $book->slug) }}">{{ $book->name }}</a>
						<div class="rating">
							@if($book->count_rating > 0)
								@include('includes.rating', ['rating' => $book->avg_rating])
								<span class="totalrating">({{ $book->reviews }})</span>
							@endif
						</div>
						<p> {{ $book->price }}TK.</p>
						<button type="submit" class="btn btn-primary"  onclick="addToCart(this)"  data-id='{{$book->id}}' data-name='{{$book->name}}' data-price='{{$book->price}}' data-img='{{$book->cover_page}}'>
							<i class="fa fa-shopping-cart"></i>Add to cart
						</button>
					</div>	
				@endforeach
			</div>
		@endif

	</div>

	
@endsection