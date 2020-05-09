@extends('layouts.auth')

@section('title')
	<title>Admin Login</title>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card mt-4">
					<div class="card-body">
					  @if(Session::has('auth_error'))
					    <div class="alert alert-danger" role="alert">
					      {{session('auth_error')}}
					    </div>
					  @endif
				        <form method="POST" action="{{ action('Auth\AdminLoginController@login') }}">
				        	@csrf
				            <div class="form-group">
				                <label class="control-label">Email</label>
			                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

				            </div>
	    
				            <div class="form-group">
				               <label class="control-label">Password</label>
			                   <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
				            </div>
				            <div class="form-group">
				                <div class="utility">
				                    <div class="animated-checkbox">
				                        <label>
				                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Stay Signed in</span>
				                        </label>
				                    </div>
				                </div>
				            </div>

				            <div class="form-group btn-container">
				                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Sign In</button>
				            </div>
				        </form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection