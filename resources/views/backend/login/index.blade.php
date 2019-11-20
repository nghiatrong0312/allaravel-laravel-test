<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Admin</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/backendsite.css') }}">
        <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript" ></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
<body>
	<div class="row">
		<div class="col-sm-12 login_background" style="padding: 0px;">
			<div class="col-sm-6 login_background_left" style="padding: 0px;">
			<img src="{{ url('../storage/app/uploadbackend/background_login.png') }}">
			</div>
			<div class="col-sm-6 login_background_right" style="padding: 85px;">
				<div class="col-sm-12">
					<h2>Login</h2>
				</div>
				
					@if ( Session::has('note') )
                            <div class="col-sm-11 warning" style="width: 87%;">
                                {{ Session::get('note') }}
                            </div>       
                        @endif
                        @if ( Session::has('login.rule') )
                            <div class="col-sm-11 warning" style="width: 87%;">
                            	{{ Session::get('login.rule') }}
                            </div>    
                        @endif
                        @if ( Session::has('success') )
                            <div class="col-sm-11 warning" style="width: 87%;">
                                {{ Session::get('success') }}
                            </div>    
                        @endif
                        @if ( Session::has('error') )
                            <div class="col-sm-11 warning" style="width: 87%;">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                         @if ( Session::has('level') )
                            <div class="col-sm-11 warning" style="width: 87%;">
                                {{ Session::get('level') }}
                            </div>
                        @endif
					<div class="login_background_right-form_login">
						<form method="POST" action="{{ route('login.check') }}">
            				@csrf
							<p>Username or Email Adress</p>
							<input class="form-control" placeholder="Username or Email Adress" name="email" type="text" value="{{ old('email') }}" autofocus>
							<p class="help is-danger">{{ $errors->first('email') }}</p>
							<p>Password</p>
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
							<p class="help is-danger">{{ $errors->first('password') }}</p>
							<div class="col-sm-6 login_background_right-form_login-checkbox">
								<input type="checkbox" name="">
								<p>Remember Me</p>
							</div>
							<div class="col-sm-6 login_background_right-form_login-submit">
								<button type="submit">Log In</button>
							</div>
						</form>
					</div>
			</div>
		</div>
		
	</div>
</body>
</html>