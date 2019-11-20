@extends('welcome')
@section('navbar')
@section('content')
	<div class="row header_categories">
		<img src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
		<div class="col-sm-12 header_categories-text">
			<h2>Contact</h2>
		</div>
	</div>
	<div class="container contact">
		<h2>Contact</h2>
		<?php foreach ($address_data as $key => $address_datas): ?>
		
			<div class="col-sm-12" id="contact_map">
				<?php echo $address_datas['maps'] ?>	
			</div>

			<div class="col-sm-8" id="contact_feedback">
				<h3>feedback to us</h3>
				<form>
				@csrf
				<div class="col-sm-12">
					<textarea placeholder="Enter Message"></textarea>
				</div>
				<div class="col-sm-6">
					<input type="text" placeholder="Enter Your Name" name="feedback_name">
				</div>
				<div class="col-sm-6">
					<input type="text" placeholder="Enter Email Address" name="feedback_email">
				</div>
				<div class="col-sm-12">
					<input type="text" placeholder="Enter Subject" name="feedback_sbuject">
				</div>
				<button>send message</button>
				</form>
			</div>
			<div class="col-sm-4" id="contact_address">
				<i class="fa fa-map-marker"></i>
				<p><?php echo $address_datas['address'] ?></p>
				<i class="fa fa-phone"></i>
				<p><?php echo $address_datas['phone'] ?></p>
				<i class="fa fa-envelope-o"></i>
				<p><?php echo $address_datas['email'] ?></p>
				<div id="socia_network">
					<?php foreach ($network_data as $key => $network_datas): ?>						
					<a href="<?php echo $network_datas['link'] ?>" target="_blank"><?php echo $network_datas['icon'] ?></a>

					<?php endforeach ?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
@endsection