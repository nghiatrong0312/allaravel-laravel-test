@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
$id_product = 0;
foreach ($id_pro as $key => $value) {
	if ($value['id_product'] == null) {
		$id_product = 1;
	}
	elseif ($value['id_product'] != 0) {
		$id_product = $value['id_product'];
	}
}

?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Products Create / <small><a href="{{ url('/admin/product/viewall') }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
    		<div class="viewdetail-body-info">
    			<form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
    			@csrf	
    				<input style="display: none;" type="text" name="product_id" value="<?php echo ++$id_product ?>">
		        	<div class="row">
		        		<div class="col-sm-4">
		        			<label>Name Product</label>
		        			<input type="text" value="" name="product_name">
		        			<p class="help is-danger">{{ $errors->first('product_name') }}</p>
		        		</div>
		        		<div class="col-sm-4">
		        			<label>Price Product</label>
		        			<input type="text" value="" name="product_price">
		        			<p class="help is-danger">{{ $errors->first('product_price') }}</p>
		        		</div>
		        		<div class="col-sm-4">
		        			<label>Quantity Product</label>
		        			<input type="text" value="" name="product_quantity">
		        			<p class="help is-danger">{{ $errors->first('product_price') }}</p>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-6">
		        			<label>Categories Product</label>
		        			<select name="product_categories">
		        				<option> -- Categories --</option>
		        				<?php foreach ($categories as $key => $category): ?>
		        				<option value="<?php echo $category['id_categories'] ?>" ><?php echo $category['categories_name'] ?></option>
		        				<?php endforeach ?>
		        			</select>
		        			<p class="help is-danger">{{ $errors->first('product_category') }}</p>
		        		</div>
		        		<div class="col-sm-3">
		        			<label>Brand Product</label>
		        			<input type="text" value="" name="product_brand">
		        			<p class="help is-danger">{{ $errors->first('product_brand') }}</p>
		        		</div>
		        		<div class="col-sm-3">
		        			<label>Status</label>
		        			<select name="status_product">
		        				<option selected="selected" value="1">New</option>
		        				<option value="2">Sale</option>
		        			</select>
		        			<p class="help is-danger">{{ $errors->first('product_brand') }}</p>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-6">
		        			<label>Size Product</label>
		        			<div class="row edit_product-size">
				        			<div class="col-sm-2">
					        			<label>S</label>
					        			<input type="checkbox" name="size_product[]" multiple value="s">
					        		</div>	
					        		<div class="col-sm-2">
					        			<label>M</label>
					        			<input type="checkbox" name="size_product[]" multiple value="m">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>L</label>
					        			<input type="checkbox" name="size_product[]" multiple value="l">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>XL</label>
					        			<input type="checkbox" name="size_product[]" multiple value="xl">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>XXL</label>
					        			<input type="checkbox" name="size_product[]" multiple value="xxl">
					        		</div>
		        			</div>
		        			<p class="help is-danger">{{ $errors->first('product_size') }}</p>
		        		</div>
		        		<div class="col-sm-6">
		        			<label>Color Product</label>
		        			<div class="row edit_product-size">

				        			<div class="col-sm-2">
					        			<label>Xanh</label>
					        			<input type="checkbox" name="color_product[]" multiple value="Xanh">
					        		</div>	
					        		<div class="col-sm-2">
					        			<label>Do</label>
					        			<input type="checkbox" name="color_product[]" multiple value="Do">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>Den</label>
					        			<input type="checkbox" name="color_product[]" multiple value="Den">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>Trang</label>
					        			<input type="checkbox" name="color_product[]" multiple value="Trang">
					        		</div>
					        		<div class="col-sm-2">
					        			<label>Vang</label>
					        			<input type="checkbox" name="color_product[]" multiple value="Vang">
					        		</div>
		        			</div>
		        			<p class="help is-danger">{{ $errors->first('product_color') }}</p>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<label>Introduction Product</label>
		        		<textarea name="intro_product" placeholder="Enter Introduction Product"></textarea>
		        		</div>
		        	</div>
		        	<div class="row edit_product-avatar">
		        		<div class="col-sm-12">
		        			<label>Avatar Product</label>
		        			<input type="file" name="product_avatar">
		        			<p class="help is-danger">{{ $errors->first('product_avatar') }}</p>
		        		</div>
		        	</div>
		        	<div class="row edit_product-library">
		        		<div class="col-sm-12">
		        			<label>Library Product</label><br>
		        			<input style="border: none;" type="file" name="product_library[]" multiple>
		        			<p class="help is-danger">{{ $errors->first('product_library') }}</p>
		        		</div>
		        	</div>
		        	<div class="row edit_product-submit">
		        		<button type="submit">Create Product</button>
		        	</div>
	        	</form>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection