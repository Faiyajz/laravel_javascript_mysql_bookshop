@extends('layouts.frontend')

@section('content')

<div class="row">
	<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<img src="{{$user->avatar =='/customers/' ? 'https://image.ibb.co/jw55Ex/def_face.jpg' : $user->avatar}}" class="rounded-circle f-profile-pic"/>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between"><h4>Profile</h4></li>
					<li class="list-group-item d-flex justify-content-between ">Name<span>{{ $user->name }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Phone<span>{{ $user->phone }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Email<span>{{ $user->email }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Gender<span>{{ $user->gender }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Address<span>{{ $user->address }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Division<span>{{ $user->division }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">District<span>{{ $user->district }}</span></li>
					<li class="list-group-item d-flex justify-content-between ">Zip Code<span>{{ $user->zip_code }}</span></li>
				</ul>
		        <div class="d-print-none mt-2">
		            <div class="text-right"><a class="btn btn-primary" href="{{ route('profile.edit', $user->slug) }}"><i class="fa fa-edit"></i> Edit</a></div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection