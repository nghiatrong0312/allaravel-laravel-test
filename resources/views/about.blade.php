@extends('welcome')
@section('navbar')
@section('content')
	<div class="row header_categories">
		<img src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
		<div class="col-sm-12 header_categories-text">
			<h2>About</h2>
		</div>
	</div>
	<div class="container about">
		<div class="col-sm-4 about_img">
			<img src="{{ url('../storage/app/upload/picture1.jpg') }}">
		</div>
		<div class="col-sm-8 about_intro">
		<h2>Introduction About US</h2>
		<p>
			But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
			But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
			<br><br>
			But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
		</p>
		</div>
		<div class="col-sm-12 about_service">
			<h1>Service</h1>
			<div class="col-sm-4" id="delivery">
				<i class="fa fa-paper-plane-o"></i>
				<label>Free Delivery Worldwide</label>
				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
			</div>
			<div class="col-sm-4" id="return">
				<i class="fa fa-history"></i>
				<label>30 Days Return</label>
				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
			</div>
			<div class="col-sm-4" id="opening">
				<i class="fa fa-ticket"></i>
				<label>Store Opening</label>
				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
			</div>
		</div>
		
	</div>
	<div class="container-fluld parallax about_earn">
		<div class="col-sm-3">
			<i class="fa fa-users"></i>
			<h2>200</h2>
			<p>Happy Customer</p>
		</div>	
		<div class="col-sm-3">
			<i class="fa fa-map-marker"></i>
			<h2>5</h2>
			<p>Brand</p>
		</div>	
		<div class="col-sm-3">
			<i class="fa fa-paw"></i>
			<h2>1500</h2>
			<p>Visit</p>
		</div>	
		<div class="col-sm-3">
			<i class="fa fa-cubes"></i>
			<h2>350</h2>
			<p>Product</p>
		</div>		
	</div>
	<div class="container about_subscribe">
		<h2>Subcribe to our Newsletter</h2>
		<div class="col-sm-12">
		<input type="" name="" placeholder="Enter Email Address">
		<button>subsribe</button>
		</div>
	</div>
@endsection