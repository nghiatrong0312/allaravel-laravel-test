@extends('welcome')
@section('navbar')
@section('content')
<div class="row checkout_page">
	<div class="col-sm-6" id="info_customer" style=" min-height: 450px;background-color: #ffffff">
		<div id="bredcrumb">
		<small>Cart > Information > Shipping</small>
		</div>
		@if ( Session::has('note_checkout') )
                <div id="hide" class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('note_checkout') }}
                </div>
        @endif
		<form method="POST" action="{{ url('/order') }}">
		@csrf
		
		<div class="col-sm-12">
			<label>Contact information</label>
			<input type="" name="" disabled="" placeholder="Emter Email" value="<?php echo $user['email'] ?>">
		</div>
		<br>
		<div class="col-sm-12">
			<label>Shipping address</label>
		</div>
		<div class="col-sm-6">

			<input type="" name="firstname" disabled="" placeholder="First Name" value="<?php echo $user['firstname'] ?>">
		</div>
		<div class="col-sm-6">
			<input type="" name="lastname" disabled="" placeholder="Last Name" value="<?php echo $user['lastname'] ?>">
		</div>
		<div class="col-sm-12">
			<input type="" name="address" placeholder="Address" value="<?php echo $user['address'] ?>">
		</div>
		<div class="col-sm-12">
			<input type="" name="city" placeholder="City" value="<?php echo $user['city'] ?>">
		</div>
		<div class="col-sm-12">
			<input type="number" name="phonenumber" placeholder="Phone Number" value="<?php echo $user['numberphone'] ?>">
		</div>

<!-- save data for Order Table And Order_product Table -->

		<?php 
			$id_product 		= 0; 
			$total_amount_data 	= 0;
			$price_data 		= 0;
			$total_price_data 	= 0;
			$total_bill_data 	= 0;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$current_time   = date("Y-m-d H:i:s");
			$time_delete    = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($current_time)));

		?>
		<?php foreach ($cart_data as $key => $value): ?>
		<?php  
			$id_product 		= $value['product_id'];
			$total_amount_data 	+= $value['amount'];
			$price_data 		= $value['amount']*$value['product_price'];
			$total_price_data 	+= $price_data;
			$total_bill_data 	= $total_price_data*(100-$discount)/100;
		?>
		<?php endforeach ?>
		<input style="display:none;" type="text" name="id_customer" value="<?php echo $user['id'] ?>">
		<input style="display:none;" type="text" name="order_id" value="<?php echo ++$id_order ?>">
		<input style="display:none;" type="text" name="id_product" value="<?php  echo $id_product;?>">
		<input style="display:none;" type="text" name="total_price" value="<?php echo $total_bill_data ?>">
		<input style="display:none;" type="text" name="total_amount" value="<?php echo $total_amount_data ?>">
		<input style="display:none;" type="number" name="discount" value="<?php echo $discount ?>">
		<input style="display:none;" type="text" name="gift_code" value="<?php echo $gift_code ?>">
		<input style="display:none;" type="text" name="time_delete" value="<?php echo $time_delete ?>">
		<div class="col-sm-12">
		<button>continue to order</button>

<!-- End save data for Order Table And Order_product Table -->

		</div>
		</form>
	</div>
	<div class="col-sm-6" id="info_cart" style="background-color: #f3f3f3">
		<?php $price = $total_price = $total_bill = 0; ?>
		<?php foreach ($cart_data as $key => $cart_datas): ?>
		<?php  
			$price = $cart_datas['amount']*$cart_datas['product_price'];
			$total_price += $price;

			$total_bill = $total_price*(100-$discount)/100;
		?>
		<div class="col-sm-12" style="margin-bottom: 30px;">
			<div class="col-sm-2" id="info_cart-img">
				<img src="{{ url('../storage/app/upload/avatar.jpg') }}">
				<small><?php echo $cart_datas['amount'] ?></small>
			</div>
			<div class="col-sm-7" id="info_cart-name">
				<h4><?php echo $cart_datas['product_name'] ?></h4>
				<small>S / Gray</small>
			</div>
			<div class="col-sm-3" id="info_cart-price">
				<span><?php echo number_format($price, '0', ',', '.') ?><small>vnd</small></span>
			</div>
		</div>
		<?php endforeach ?>	
		<div class="col-sm-12">
			<hr>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-9">
				<h5>Total Price</h5>
			</div>
			<div class="col-sm-3">
				<span><?php echo number_format($total_price, '0', ',', '.') ?> <small>vnd</small></span>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-9">
				<h5>Discount</h5>
			</div>
			<div class="col-sm-3">
				<span><?php echo $discount ?>%</span>
			</div>
		</div>
		<div class="col-sm-12">
			<hr>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-9">
				<h5>Total Bill</h5>
			</div>
			<div class="col-sm-3">
				<span><?php echo number_format($total_bill, '0', ',', '.') ?> <small>vnd</small></span>
			</div>
		</div>
	</div>

</div>
@endsection