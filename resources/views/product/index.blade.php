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
			<h2>Boxy T-Shirt with Roll Sleeve Detail</h2>
			<h3>300.000 <small>VND</small	></h3>
			<p>Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.</p>
			<div class="col-sm-12 detail_product-info-select">
				<div class="col-sm-2">
					<h5>size</h5>
				</div>
				<div class="col-sm-10">
					<select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="vw">VW</option>
					  <option value="audi" selected>Audi</option>
					</select>
				</div>
			</div>
			<div class="col-sm-12 detail_product-info-select">
				<div class="col-sm-2">
					<h5>color</h5>
				</div>
				<div class="col-sm-10">
					<select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="vw">VW</option>
					  <option value="audi" selected>Audi</option>
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