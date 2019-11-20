@extends('welcome')
@section('navbar')
@section('content')
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
				<p>Showing 1–12 of 16 results</p>
				</div>
				<div class="col-sm-4 categories_product_item-content">
					<div class="categories_product-hover">
					</div>
					<div class="categories_product_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
				<div class="col-sm-4 categories_product_item-content">
					<div class="categories_product-hover">
					</div>
					<div class="categories_product_item_button-addtocart">
						<button>Add to cart</button>
					</div>
					<div class="status_product-new">
						<button>new</button>
					</div>
					<img class="a" src="{{ url('../storage/app/upload/item1.jpg') }}" >
					
					<a href="">denim jacket blue</a>
					<p>$75.00</p>
				</div>
				<div class="col-sm-4 categories_product_item-content">
					<div class="categories_product-hover">
					</div>
					<div class="categories_product_item_button-addtocart">
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