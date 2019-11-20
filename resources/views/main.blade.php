@extends('welcome')
@section('navbar')
@section('content')
<?php  
use App\Products;

$product = Products::cursor();

?>
	<div class="content_home">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <!-- <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol> -->

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">

	      <div class="item active" >
	        <img src="{{ url('../storage/app/upload/slide1.png') }}" alt="Los Angeles" style="width:100%; height: 550px">
	        <div class="carousel-caption">
	          <h3>Los Angeles</h3>
	          <p>LA is always so much fun!</p>
	        </div>
	      </div>

	      <div class="item">
	        <img src="{{ url('../storage/app/upload/slide2.jpg') }}" alt="Chicago" style="width:100%; height: 550px">
	        <div class="carousel-caption">
	          <h3>Chicago</h3>
	          <p>Thank you, Chicago!</p>
	        </div>
	      </div>
	    
	      <div class="item">
	        <img src="{{ url('../storage/app/upload/slide3.jpg') }}" alt="New York" style="width:100%; height: 550px">
	        <div class="carousel-caption">
	          <h3>New York</h3>
	          <p>We love the Big Apple!</p>
	        </div>
	      </div>
	  
	    </div>

	    <!-- Left and right controls -->
	    <div class="controls_slide">
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
		</div>
	</div>
	</div>
	<div class="container img_banner_home">
		<div class="col-sm-4 img_banner_home-1">
			<div id="img_banner_edit_button">
				<button style="margin-top: 75%">dresses</button>
				<div class="img-hover-zoom">
				  <img src="{{ url('../storage/app/upload/picture1.jpg') }}" alt="This zooms-in really well and smooth">
				</div>
			</div>
			<div id="img_banner_edit_button">
				<button style="margin-top: 75%">watch</button>
				<div class="img-hover-zoom">
				<img src="{{ url('../storage/app/upload/picture9.jpeg') }}">
				</div>
			</div>
		</div>
		<div class="col-sm-4 img_banner_home-2">
			<div id="img_banner_edit_button">
				<button style="margin-top: 75%">glass</button>
				<div class="img-hover-zoom">
				<img src="{{ url('../storage/app/upload/item4.jpg') }}">
				</div>
			</div>
			<div id="img_banner_edit_button">
				<button style="margin-top: 75%">footerwear</button>
				<div class="img-hover-zoom">
				<img src="{{ url('../storage/app/upload/item3.jpg') }}">
				</div>
			</div>
		</div>
		<div class="col-sm-4 img_banner_home-3">
			<div id="img_banner_edit_button">
				<button style="margin-top: 75%">bags</button>
				<div class="img-hover-zoom">
				<img src="{{ url('../storage/app/upload/item1.jpg') }}">
				</div>
			</div>
			<div class="more">
				<div class="more-info">
				<h2>SIGN UP & GET 20% OFF</h2>
				<p>Be the frist to know about the latest fashion news and get exclu-sive offers</p>
				<button>sign up</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container main_feature_product">
		<div class="main_feature_product-text">
			<h2>FEATURED PRODUCTS / <small>view more</small></h2> 
		</div>	
		
		<!-- <div class="col-sm-12 main_feature_product-item">
			<?php foreach ($product as $key => $products): ?>
			<div class="col-sm-3 main_feature_product_item-content">
				<div class="hover">
				</div>
				<div class="main_feature_product_item_button-addtocart">
					<button onclick="addCart(<?php echo $products['id_product'] ?>)">Add to cart</button>
				</div>
				<div class="status_product-new">
					<button>new</button>
				</div>
				<img class="a" src="<?php echo url('../storage/app/upload', ['img' => $products['product_img']]) ?>" >
				
				<a href="{{ url('/product', ['id' => $products['id_product']]) }}"><?php echo $products['product_name'] ?></a>
				<p><?php echo number_format($products['product_price'], 0, ',', '.'); ?></p>
			</div>
			<?php endforeach ?> -->
			<!-- <div class="col-sm-3 main_feature_product_item-content">
				<div class="hover">
				</div>
				<div class="main_feature_product_item_button-addtocart">
					<button>Add to cart</button>
				</div>
				<img src="{{ url('../storage/app/upload/item2.jpg') }}">
				<a href="">denim jacket blue</a>
				<p>$75.00</p>
			</div>
			<div class="col-sm-3 main_feature_product_item-content">
				<div class="hover">
				</div>
				<div class="main_feature_product_item_button-addtocart">
					<button>Add to cart</button>
				</div>
				<img src="{{ url('../storage/app/upload/item1.jpg') }}">
				<a href="">denim jacket blue</a>
				<p>$75.00</p>
			</div>
			<div class="col-sm-3 main_feature_product_item-content">
				<div class="hover">
				</div>
				<div class="main_feature_product_item_button-addtocart">
					<button>Add to cart</button>
				</div>
				<div class="status_product-sale">
					<button>new</button>
				</div>
				<img src="{{ url('../storage/app/upload/item2.jpg') }}">
				<a href="">denim jacket blue</a>
				<p>$75.00</p>
			</div> -->
		<!-- </div> -->
	</div>
<!-- slide demo -->
	<div class="container main_feature_product">
	  <div class="autoplay">
	  	<?php foreach ($product as $key => $products): ?>
	  	<div class="col-sm-3 main_feature_product-item">
			
			<div class=" main_feature_product_item-content">
				<div class="hover">
				</div>
				<div class="main_feature_product_item_button-addtocart">
					<button onclick="addCart(<?php echo $products['id_product'] ?>)">Add to cart</button>
				</div>
				<div class="status_product-new">
					<button>new</button>
				</div>
				<img class="a" src="<?php echo url('../storage/app/upload', ['img' => $products['product_img']]) ?>" >
				
				<a href="{{ url('/product', ['id' => $products['id_product']]) }}"><?php echo $products['product_name'] ?></a>
				<p><?php echo number_format($products['product_price'], 0, ',', '.'); ?></p>
			</div>
			
		</div>
		<?php endforeach ?>
	  </div>
	</div>
<!-- slide demo end -->
	<div class="row collection_content">
		<div class="col-sm-6 collection_content-picture">
			<div class="collection_content-picture-text">
			<h2>The Beauty</h2>
			<h1>LOOKBOOK</h1>
			<button>View collection</button>
			</div>
			<div class="img-hover-zoom">
			<img src="{{ url('../storage/app/upload/collection_picture.jpg') }}">
			</div>
		</div>

		<div class="col-sm-6 collection_content-sale">
			<div class="collection_content-sale-text">
			<div id="text_sale">
				<h3><a href="{{ url('productsale') }}"><?php echo $product_name ?></a></h3>
				<p style="display: <?php echo $block_discount ?>">
					<span style="text-decoration: line-through"><?php echo number_format($product_price,'0',',','.') ?></span> -
					<?php echo number_format($price_discount,'0',',','.') ?>
				</p>
				<p style="display: <?php echo $block_done ?>"> 
					<?php echo number_format($product_price,'0',',','.') ?>
				</p>
			</div>
			<div id="clockdiv" countdown="" data-date="<?php echo $expiry_time ?>">
			  <div>
			    <span data-days="">00</span>
			    <div class="smalltext">Days</div>
			  </div>
			  <div>
			    <span data-hours="">00</span>
			    <div class="smalltext">Hours</div>
			  </div>
			  <div>
			    <span data-minutes="">00</span>
			    <div class="smalltext">Minutes</div>
			  </div>
			  <div>
			    <span data-seconds="">00</span>
			    <div class="smalltext">Seconds</div>
			  </div>
			</div>
			</div>
			<div class="img-hover-zoom">
			<img src="{{ url('../storage/app/upload/sale_picture.jpg') }}">
			</div>
		</div>
	</div>
	<div class="row blogs_content">
		<div class="col-sm-12 blogs_content-name">
		<h2>our blog / <small>view more</small></h2>
		</div>
		<div class="col-sm-12 blogs_content-post">
			<div class="col-sm-4">
				<img src="{{ url('../storage/app/upload/blog_picture.jpg') }}">
				<h4>Black Friday Guide: Best Sales & Discount Codes</h4>
				<p><span>By</span> Nancy Ward <span>on</span> July 22, 2017</p>
				<p>
					Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
				</p>
			</div>
			<div class="col-sm-4">
				<img src="{{ url('../storage/app/upload/blog_picture2.jpg') }}">
				<h4>Black Friday Guide: Best Sales & Discount Codes</h4>
				<p><span>By</span> Nancy Ward <span>on</span> July 22, 2017</p>
				<p>
					Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
				</p>
			</div>
			<div class="col-sm-4">
				<img src="{{ url('../storage/app/upload/blog_picture3.jpg') }}">
				<h4>Black Friday Guide: Best Sales & Discount Codes</h4>
				<p><span>By</span> Nancy Ward <span>on</span> July 22, 2017</p>
				<p>
					Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
				</p>
			</div>
		</div>
	</div>
	<div class="row service">
		<div class="col-sm-12 service-content">
			<div class="col-sm-4">
				<p>Free Delivery Worldwide</p>
				<a href="">Click here for more info</a>
			</div>
			<div class="col-sm-4">
				<p>30 Days Return</p>
				<a href="">Simply return it within 30 days for an exchange.</a>
			</div>
			<div class="col-sm-4">
				<p>Store Opening</p>
				<a href="">Shop open from Monday to Sunday</a>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
		  $(".a").hover(function(){
		    $(".hover").toggleClass("addhover");
		  });
		});
	</script>
@endsection