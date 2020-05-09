@extends('layouts.auth')

@section('title')
	<title>Login Page</title>
@endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card mt-4">
					<div class="front-logo">
						<a href="{{ route('home') }}">Paperback</a>
					</div>
					<div class="card-body">
						<h5 class="text-center"><i class="fa fa-lg fa-fw fa-user"></i>Sign In</h5>
				        <form method="POST" action="{{ route('login') }}">
				        	@csrf
				            <div class="form-group">
				                <label class="control-label">Email</label>
			                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

			                    @error('email')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
				            </div>

				            <div class="form-group">
				               <label class="control-label">Password</label>
			                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

			                    @error('password')
			                        <span class="invalid-feedback" role="alert">
			                            <strong>{{ $message }}</strong>
			                        </span>
			                    @enderror
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
						<div class="a-divider-break"><h5>New to Paperback?</h5></div>
						<a href="{{ route('register') }}" class="btn btn-secondary btn-block">Create Account</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
