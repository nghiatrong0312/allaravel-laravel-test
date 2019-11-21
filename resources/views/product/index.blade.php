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
		        	<?php  
		        	$quantity_img = count($library_data); 
		        	?>
		        	<?php foreach ($library_data as $key => $library_datas): ?>
		        	
		    		<div class="mySlide zoom" id="ex1">
		            	<img src="{{ url('../storage/app/upload', ['img' => $library_datas['name_img']]) }}">
		            </div>
		            
		            <?php endforeach ?>
		        </div>
		        <div class="dot">
		        	<?php foreach ($library_data as $key => $library_datas): ?>
		            <div class="col-sm-3 dot1" id="myDot" onclick="currentSlide(<?php echo $key ?>)">
		            	<img src="{{ url('../storage/app/upload', ['img' => $library_datas['name_img']]) }}">
		            </div>
		            <?php endforeach ?>
		        </div>
			</div>
		</div>
		<div class="col-sm-6 detail_product-info">
			<?php foreach ($product as $key => $products): ?>
			<h2><?php echo $products['product_name'] ?></h2>
			<h3><?php echo number_format($products['product_price'], 0, ',', '.') ?> <small>VND</small></h3>
			<p><?php echo $products['describe_product'] ?></p>
			<?php endforeach ?>
			<div class="col-sm-12 detail_product-info-select">
				<div class="col-sm-2">
					<h5>size</h5>
				</div>
				<div class="col-sm-10">
					<select>
						<?php foreach ($size_data as $key => $size_datas): ?>	

						<option value="volvo"><?php echo $size_datas['size_product'] ?></option>

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

						<option value="volvo"><?php echo $color_datas['color_product'] ?></option>

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
					  <input class="input-number" type="number" value="1" min="0" max="1000">
					  <div class="input-group-button">
					    <span class="input-number-increment">+</span>
					  </div>
					</div>
				</div>
				<div class="col-sm-5 detail_product-info-quantity_addcart-addcart" style="padding-left: 0px;">
					<button>add to cart</button>
				</div>
			</div>
			<div class="col-sm-12 detail_product-info-categories">
				<p>categories: Mug, Design</p>
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
@endsection