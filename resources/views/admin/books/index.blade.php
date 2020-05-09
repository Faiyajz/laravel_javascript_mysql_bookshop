@extends('layouts.backend')

@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-book"></i> Book</h1>
        </div>
    </div>

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

	                  @if(Session::has('book_updated'))
	                    <div class="alert alert-success" role="alert">
	                      {{session('book_updated')}}
	                    </div>
	                  @endif

	                    <div class="row">
	                        <div class="col-sm-12">
	                            <table class="table table-hover table-bordered">
	                                <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>Name</th>
	                                        <th>Writer</th>
	                                        <th>Price</th>
	                                        <th>Created</th>
	                                        <th>Updated</th>
	                                        <th>Edit</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
                                        @if($books)
                                        	@foreach($books as $book)
	                                    <tr>
	                                        <td>{{ $book->id }}</td>
	                                        <td><a href="#">{{ $book->name }}</a></td>
	                                        <td><a href="#">{{ $book->writer->name }}</a></td>
	                                        <td>{{ $book->price }}Tk.</td>
	                                        <td>{{ $book->created_at->diffForHumans() }}</td>
	                                        <td>{{ $book->updated_at->diffForHumans() }}</td>
	                                        <td>
												<a class="btn btn-primary btn-sm" href="{{ route('book.edit', $book->id) }}"><i class="fa fa-edit"></i></a>
	                                        </td>
	                                    </tr>
                                        	@endforeach	
                                        @endif
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
		    						{{ $books->render() }}
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


@endsection