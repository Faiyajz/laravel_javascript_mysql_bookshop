@extends('layouts.backend')

@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-book"></i> Books </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    
                  @if(Session::has('writer_updated'))
                    <div class="alert alert-success" role="alert">
                      {{session('writer_updated')}}
                    </div>
                  @endif

                    <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($writers)
                                        	@foreach($writers as $writer)
		                                       <tr>
		                                            <td>{{ $writer->id }}</td>
		                                            <td class="cart_coverpage"><img src="{{ $writer->avatar }}"></td>
		                                            <td><a href="{{ route('writer.show', $writer->id) }}">{{ $writer->name }}</a></td>
		                                            <td>{{ $writer->created_at->diffForHumans() }}</td>
		                                            <td>{{ $writer->updated_at->diffForHumans() }}</td>
		                                            <td> <a class="btn btn-primary btn-sm" href="{{ route('writer.edit', $writer->id) }}"><i class="fa fa-edit"></i></a></td>
	                                            </tr>
                                        	@endforeach	
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info">Showing 1 to {{$writers->currentPage()}} of {{count($writers)}} entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate">
                                  {{$writers->render()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection