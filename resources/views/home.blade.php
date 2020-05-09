@extends('layouts.frontend')

@section('preloader')
    <div class="pre_loader gray_bg text-center">
        <div class="loader">
            <div><div><div><div></div></div></div></div>
        </div>
    </div>
@endsection

@section('content')

	<div class="slide-area">
		@if($sliders)
			<ul id="demo3">
				@foreach($sliders as $slider)
					<li><img height="100" src="{{ $slider->banner }}"/></li>
				@endforeach
			</ul>
		@endif
	</div>

	<div class="book-section-1">
		<div class="home-title">
			<h3 class="text-center">New Releases</h3>
			<a href="{{ route('new.releases.books')  }}">See All</a>
		</div>
		@if(session()->has('success_message'))
			<div class="alert alert-success">
				{{session()->get('success_message')}}
			</div>
		@endif

		@if($topsellingbooks)
			<div class="responsive">
				@foreach($topsellingbooks as $book)
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
						<p> {{ $book->price }}TK.</p>
						<button type="submit" class="btn btn-primary"  onclick="addToCart(this)"  data-id='{{$book->id}}' data-name='{{$book->name}}' data-price='{{$book->price}}' data-img='{{$book->cover_page}}'>
							<i class="fa fa-shopping-cart"></i>Add to cart
						</button>
					</div>	
				@endforeach
			</div>
		@endif
	</div>


	<div class="book-section-1">
		<div class="home-title">
			<h3 class="text-center">Best Sellers</h3>
			<a href="{{ route('best.sellers.books') }}">See All</a>
		</div>
		@if(session()->has('success_message'))
			<div class="alert alert-success">
				{{session()->get('success_message')}}
			</div>
		@endif

		@if($topsellingbooks)
			<div class="responsive">
				@foreach($topsellingbooks as $book)
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

@section('footer')
	@include('includes.footer')
@endsection

@section('scripts')

<script>
	


</script>

@endsection