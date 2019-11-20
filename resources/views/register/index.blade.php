@extends('welcome')
@section('navbar')
@section('content')
<div class="row" style="-webkit-filter: grayscale(50%) ;width: 100%; background-image: url('../storage/app/upload/background_login.jpg');">
	
	<div class="container">
		<div class="col-sm-6 register_customer">
		<form method="POST" action="{{ route('register.store') }}">
		@csrf	
			<h2>Register</h2>
			<div class="col-sm-6">
				<label>First Name</label>
				<input style="width: 98%" placeholder="First Name" type="text" name="firstname">
				<p class="help is-danger">{{ $errors->first('firstname') }}</p>
			</div>
			<div class="col-sm-6">
				<label>Last Name</label>
				<input type="text" placeholder="Last Name" name="lastname">
				<p class="help is-danger">{{ $errors->first('lastname') }}</p>
			</div>
			<label>Email</label>
			<input type="text" placeholder="Email" name="email">
			<p class="help is-danger">{{ $errors->first('email') }}</p>
			<label>Password</label>
			<input type="password" placeholder="Password" name="password">
			<p class="help is-danger">{{ $errors->first('password') }}</p>
			<label>Password</label>
			<input type="password" placeholder="Confirmation Password" name="password_confirmation"a>
			<p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
			<div class="col-sm-12 forget_register_pass" style="text-align: center; margin-top: 10px; margin-left: 90px;">
            <div class="col-sm-2">
                <input type="checkbox" name="checkbox">
            </div>
            <div class="col-sm-9" style="padding: 0px; text-align: left;">
                <p><a href="">Dong Y Dieu Khoan</a></p>
            </div>
            <p class="help is-danger">{{ $errors->first('checkbox') }}</p>
            
        </div>
			<button>Register</button><br>
		</form>	
		</div>
	</div>
</div>
@endsection