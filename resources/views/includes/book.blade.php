
	<div class="row mb-4">
	   <div class="col-md-3 col-10">
         <div class="book-coverphoto">
            <img src="{{ $book->cover_page }}">
            <div class="middle">
            	<span>Open</span>
            </div>
         </div>
	   </div>
	   <div class="col-md-6">
	      <div class="book-information">
	         <h4>{{ $book->name }}</h4>
	         <span>by <a href="{{ route('home.writer', $book->writer->slug) }}">{{ $book->writer->name }}</a></span>
	         <div class="rating">
	            @include('includes.rating', ['rating' => $book->avg_rating])
	            <div class="badge badge-secondary">{{ $book->reviews }} Reviews</div>
	         </div>
	         <article class="text-justify">
	            {!! $book->description !!}
	         </article>
	    
	      </div>
	   </div>
	   <div class="col-md-3">
	      <div class="pricebox">
	         	<p>Price: Tk. <span> {{ $book->price }}</span></p>
				<button type="submit" class="btn btn-primary"  onclick="addToCart(this)"  data-id='{{$book->id}}' data-name='{{$book->name}}' data-price='{{$book->price}}' data-img='{{$book->cover_page}}'>
					<i class="fa fa-shopping-cart"></i>Add to cart
				</button>
	      </div>
	   </div>
	</div>

	<div class="row">
		<div class="col-md-9">
			<div class="card mb-3">
				<div class="card-body">
				    @if(Session::has('new_comment'))
					    <div class="alert alert-success" role="alert">
					      {{session('new_comment')}}
					    </div>
					@elseif(Session::has('new_reply'))
					    <div class="alert alert-success" role="alert">
					      {{session('new_reply')}}
					    </div>
					@endif
					<div class="mb-3" id="getreview">
						<div class="rating-stars text-left">
						    <ul id="stars">
						        <li class="star" data-value="1"> <i class="fa fa-star"></i> </li>
						        <li class="star" data-value="2"> <i class="fa fa-star"></i> </li>
						        <li class="star" data-value="3"> <i class="fa fa-star"></i> </li>
						        <li class="star" data-value="4"> <i class="fa fa-star"></i> </li>
						        <li class="star" data-value="5"> <i class="fa fa-star"></i> </li>
						    </ul>
						</div>

		                {!! Form::open(['action'=>'CommentController@postComent']) !!}
		                	{{ Form::hidden('rating', '1', ['id' => 'defaultone']) }}
		                	{{ Form::hidden('book_id', $book->id, ['id' => 'defaultone']) }}
	                        <div class="form-group">
                                {!! Form::textarea('comment', null, ['class'=>'form-control', 'required' => 'required', 'rows'=>3]) !!}
	                        </div>
	                    	{!! Form::submit('Comment', ['class'=>'btn btn-primary btn-md']) !!}
	                	{!! Form::close() !!}
					</div>

				</div>
			</div>
			
		    <div class="card mb-2">
		    	@php $cnt = 0 @endphp
		    	@foreach($book->comments as $cmt)
		        	<div class="card-body">
			    		@if($cnt) <hr> @endif
		                <div class="row">
		                    <div class="col-md-2">
		                        <img src="{{$cmt->user->avatar =='/customers/' ? 'https://image.ibb.co/jw55Ex/def_face.jpg' : $cmt->user->avatar}}" class="img img-rounded img-fluid h-50px"/>
		                        <p class="text-secondary mt-2">{{ $cmt->created_at->diffForHumans() }}</p>
		                    </div>
		                    <div class="col-md-10">
	                            <p class="float-left text-primary"><strong>{{ $cmt->user->name }}</strong></p>
	                            <div class="float-right">
                    				@include('includes.rating', ['rating' => $cmt->rating])
	                        	</div>
		                       
		                       <div class="clearfix"></div>
		                        <p>{{ $cmt->comment }}</p>
		                        
	                            <a class="float-right btn btn-outline-primary ml-2" data-id="{{ $cmt->id }}"> <i class="fa fa-reply"></i> Reply</a>
		         
		                    </div>
		                </div>
			            <div class="reply-section">
			            	@foreach($cmt->replies as $reply)
				                <div class="row">
				                    <div class="col-md-2">
        		                        <img src="{{$reply->user->avatar =='/customers/' ? 'https://image.ibb.co/jw55Ex/def_face.jpg' : $reply->user->avatar}}" class="img img-rounded img-fluid h-50px"/>
				                        <p class="text-secondary mt-2">{{ $reply->created_at->diffForHumans() }}</p>
				                    </div>
				                    <div class="col-md-10">
				                        <p class="text-primary"><strong> {{ $reply->user->name }}</strong></p>
				                        <p>{{ $reply->reply }}</p>
				                    </div>
				                </div>
				             @endforeach
			                <div class="row">
			                    <div class="col-md-12">


                        			{!! Form::open(['action'=>'CommentController@postReply', 'class' => 'd-none', 'id' => $cmt->id]) !!}
                            			{!! Form::hidden('comment_id', $cmt->id) !!}
				                        <div class="form-group">
				                            {!! Form::textarea('reply', null, ['class'=>'form-control', 'rows'=>2]) !!}
				                        </div>

			                            {!! Form::submit('Submit', ['class'=>'btn btn-primary btn-sm']) !!}

			                        {!! Form::close() !!}

			                    </div>
			                </div>                        
			            </div>
			        </div>
			        @php $cnt++ @endphp
		        @endforeach

		    </div>
		</div>
	</div>
