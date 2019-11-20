@extends('welcome')
@section('navbar')
@section('content')
<div class="row" style="-webkit-filter: grayscale(50%) ;width: 100%; background-image: url('../storage/app/upload/background_login.jpg');">
	
	<div class="container">
		<div class="col-sm-4 login_customer">
		<form method="POST" action="{{ url('login') }}">
		@csrf	
			@if ( Session::has('warning') )
                <div id="hide" class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('warning') }}
                </div>
            @endif
            @if ( Session::has('comment_warning') )
                <div id="hide" class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('comment_warning') }}
                </div>
            @endif
			<h2>Login</h2>
			<label>Email</label>
			<input type="text" name="email">
			<label>Password</label>
			<input type="password" name="password">
			<button>login</button>
			<a href="{{ route('facebook.login')}}" class="btn btn-primary">Facebook Login</a>
			<div class="col-sm-12">
			<a href="{{ url('register') }}">Create Account</a>
			</div>
			<div class="col-sm-12">
			<a href="">Forgot Password ?</a>
			</div>
		</form>	
		</div>
	</div>
</div>
@endsection
