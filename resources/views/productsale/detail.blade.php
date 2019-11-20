@extends('welcome')
@section('navbar')
@section('content')
<div class="row">
	<div class="container detail_product">
		<div class="container bredcrumb">
			<p>
			Home > Women > T-Shirt > Boxy T-Shirt with Roll Sleeve Detail
			</p>
		</div>
		<div class="col-sm-6 detail_product-img">
			<div class="col-sm-12" style="padding: 0px;">
		        <div class="slideshow-container">   
		    		<div class="mySlide zoom" id="ex1">
		            	<img src="{{ url('../storage/app/upload/2.jpg') }}">
		            </div>
		            <div class="mySlide ">
		            	<img src="{{ url('../storage/app/upload/3.jpg') }}">
		            </div>
		            <div class="mySlide">
		            	<img src="{{ url('../storage/app/upload/4.jpg') }}">
		            </div>
		            <div class="mySlide">
		            	<img src="{{ url('../storage/app/upload/5.jpg') }}">
		            </div>
		        </div>
		        <div class="dot">
		            <div class="col-sm-3 dot1" id="myDot" onclick="currentSlide(1)">
		            	<img src="{{ url('../storage/app/upload/2.jpg') }}">
		            </div>
		            <div class="col-sm-3 dot1" id="myDot" onclick="currentSlide(2)">
		            	<img src="{{ url('../storage/app/upload/3.jpg') }}">
		            </div>
		            <div class="col-sm-3 dot1" id="myDot" onclick="currentSlide(3)">
		            	<img src="{{ url('../storage/app/upload/4.jpg') }}">
		            </div>
		            <div class="col-sm-3 dot1" id="myDot" onclick="currentSlide(4)">
		            	<img src="{{ url('../storage/app/upload/5.jpg') }}">
		            </div>
		        </div>
			</div>
		</div>
		<div class="col-sm-6 detail_product-info">
			<h2 id="sale_name"><?php echo $product_name ?></h2>
			<h3 style="display: <?php echo $block_discount ?>">

				<span id="detail_product_sale">
					<?php echo number_format($product_price,'0',',','.') ?>
				</span> 
				<span id="sale_product">
					<?php echo number_format($price_discount,'0',',','.') ?>
					<small>VND</small>
				</span>

			</h3>
			<h3 style="display: <?php echo $block_done ?>">
				<?php echo number_format($price_discount,'0',',','.') ?> <small>VND</small>
			</h3>
			<p>Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.</p>
			<div class="col-sm-12 detail_product-info-select">
				<div class="col-sm-2">
					<h5>size</h5>
				</div>
				<div class="col-sm-10">
					<select>
						<?php foreach ($size_data as $key => $size_datas): ?>						
						<option value="<?php echo $size_datas['id'] ?>"><?php echo $size_datas['size_product'] ?></option>

						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-sm-12 detail_product-info-select">
				<div class="col-sm-2">
					<h5>color</h5>
				</div>
				<div class="col-sm-10">
					<select>
						<?php foreach ($color_data as $key => $color_datas): ?>
						
						<option value="<?php echo $color_datas['id'] ?>"><?php echo $color_datas['color_product'] ?></option>

						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-sm-12 detail_product-info-quantity_addcart">
				<div class="col-sm-5 detail_product-info-quantity_addcart-quantity">
					<div class="input-group input-number-group">
					  <div class="input-group-button">
					    <span class="input-number-decrement">-</span>
					  </div>
					  <input id="sale_quantity" class="input-number" type="number" value="1" min="0" max="1000">
					  <div class="input-group-button">
					    <span class="input-number-increment">+</span>
					  </div>
					</div>
				</div>
				<div class="col-sm-5 detail_product-info-quantity_addcart-addcart" style="padding-left: 0px;">
					<button id="add_cart_sale">add to cart</button>
				</div>
			</div>
			<div class="col-sm-12 detail_product-info-categories">
				<p>categories: <?php echo $categories_name ?></p>
			</div>
			<div class="col-sm-12 detail_product-info-description">

				<h3>Description</h3>
				<p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
				</p>
			</div>
		</div>
	</div>
	<div class="container detail_product_related">
			<div class="col-sm-12 detail_product_related-tittle">
			<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="col-sm-12">
				<div class="col-sm-3 detail_product_related_item-content">
					<div class="detail_product_related-hover">
					</div>
					<div class="detail_product_related_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
				<div class="col-sm-3 detail_product_related_item-content">
					<div class="detail_product_related-hover">
					</div>
					<div class="detail_product_related_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
				<div class="col-sm-3 detail_product_related_item-content">
					<div class="detail_product_related-hover">
					</div>
					<div class="detail_product_related_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
				<div class="col-sm-3 detail_product_related_item-content">
					<div class="detail_product_related-hover">
					</div>
					<div class="detail_product_related_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#add_cart_sale').click(function(){
			var sale_product_name 	  = $('#sale_name').html();
			var sale_product_price 	  = <?php echo $price_discount ?>;
			var sale_product_id 	  = <?php echo $product_id ?>;
			var sale_product_quantity = $('#sale_quantity').val();
			$.ajax({

				url:'<?php echo url('/productsale/addcart') ?>',
				type: 'post',
				dataType: 'json',
				data: {
					"_token": "{{ csrf_token() }}",
					product_id:sale_product_id,
					product_name:sale_product_name,
					product_price:sale_product_price,
					product_quantity:sale_product_quantity
				},
			});
			setTimeout(function(){
            	$('#amount').load('<?php echo url('/productsale/setquantity') ?>').fadeIn('slow');
          	}, 100);
          	setTimeout(function(){
            	$('#amount2').load('<?php echo url('/productsale/setquantity') ?>').fadeIn('slow');
          	}, 100);
		});
	});
</script>
@endsection