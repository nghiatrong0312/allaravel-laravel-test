@extends('welcome')
@section('navbar')
@section('content')
<?php  
use App\Products;
?>
	<div class="row header_categories">
		<img src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
		<div class="col-sm-12 header_categories-text">
			<h2>women</h2>
			<h5>New Arrivals Women Collection 2018</h5>
		</div>
	</div>
	<div class="container">
		<div class="row categories_content">
			<div class="col-sm-3 categories_content-sidebar">
				<h4>Brands</h4>
				<ul>
					<li><a href="">All</a></li>
					<li><a href="">women</a></li>
					<li><a href="">men</a></li>
					<li><a href="">kids</a></li>
					
				</ul>
			</div>
			<div class="col-sm-9 categories_product">
				<div class="col-sm-12">
				<p>(<?php echo $count_product ?>) products found</p>
				</div>
				<?php foreach ($product as $key => $products): ?>
				<?php  
				$status = 0;
				$display_status = 'block';
				if ($products['status']  == 1) {
					$status = 'new';
				}elseif ($products['status']  == 2) {
					$status = 'sale';
				}else{
					$display_status = 'none';
				}
				?>
				<div class="col-sm-4 categories_product_item-content">
					<div class="categories_product-hover">
					</div>
					<div class="categories_product_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button style="display: <?php echo $display_status ?>"><?php echo $status ?></button>
					</div>
					<img class="a" src="<?php echo url('../storage/app/upload', ['img' => $products['product_img']]) ?>" >
					
					<a href=""><?php echo $products['product_name'] ?></a>
					<p><?php echo number_format($products['product_price'], 0,',','.') ?></p>
				</div>
				<?php endforeach ?>
				<?php foreach ($categories as $key => $category): ?>
				<?php $product_category = Products::where(['categories_id' => $category['id_categories']])->get(); ?>
				<?php foreach ($product_category as $key => $product_categories): ?>
				<div class="col-sm-4 categories_product_item-content">
					<div class="categories_product-hover">
					</div>
					<div class="categories_product_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button></button>
					</div>
					<img class="a" src="<?php echo url('../storage/app/upload', ['img' => $product_categories['product_img']]) ?>" >
					
					<a href=""><?php echo $product_categories['product_name'] ?></a>
					<p><?php echo number_format($product_categories['product_price'], 0,',','.') ?></p>
				</div>
				<?php endforeach ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
@endsection