@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\Categories;

$categorys = Categories::cursor();
$id_cate = 0;
$id_product = 0;
foreach ($products as $key => $value) {
	$id_cate = $value['categories_id'];
	$id_product = $value['id_product'];
}

$id_categories = $id_cate;
$categories = Categories::where(['id_categories' => $id_categories])->get();
$name_category = 0;

foreach ($categories as $key => $category) {
	$name_category = $category['categories_name'];
}
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Products Edit / <small><a href="{{ url('admin/product/viewdetail', ['id' => $id_product]) }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
    		<div class="viewdetail-body-info">
    			<form method="POST" enctype="multipart/form-data" action="{{ url('admin/product/update', ['id' => $id_product]) }}">
    			@csrf	

    				<?php foreach ($products as $key => $value): ?>

		        	<div class="row">
		        		<div class="col-sm-6">
		        			<label>Name Product</label>
		        			<input type="text" value="<?php echo $value['product_name'] ?> " name="product_name">
		        		</div>
		        		<div class="col-sm-6">
		        			<label>Price Product</label>
		        			<input type="text" value="<?php echo $value['product_price'] ?>" name="product_price">
		        		</div>
		        	</div>

		        	<div class="row">
		        		<div class="col-sm-4">
		        			<label>Categories Product</label>
		        			<select name="category_product">
		        				<option value="<?php echo $id_cate ?>"><?php echo $name_category ?></option>
		        				<?php foreach ($categorys as $key => $categoryes): ?>
		        					<option value="<?php echo $categoryes['id_categories'] ?>">
		        					<?php echo $categoryes['categories_name'] ?>
		        					</option>	
		        				<?php endforeach ?>
		        			</select>
		        		</div>
		        		<div class="col-sm-4">
		        			<label>Brand Product</label>
							<input type="text" value="<?php echo $value['brand_product'] ?>" name="brand_product">
		        		</div>
		        		<div class="col-sm-4">
		        			<label>Quantity Product</label>
		        			<input type="text" value="" name="quantity_product">
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-6">
		        			<label>Size Product / <small><a id="add_size_toggle" href="javascript:void(0)">Add Size</a></small></label>
		        			<div id="add_size_toggle1" style="display: none;" class="row edit_product-size">

			        			<div class="col-sm-2">
			        				<div class="button_color_add-name">
				        			<label>S</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="size_product[]" multiple value="s">
				        			</div>
				        		</div>	
				        		<div class="col-sm-2">
			        				<div class="button_color_add-name">
				        			<label>M</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="size_product[]" multiple value="M">
				        			</div>
				        		</div>	
				        		<div class="col-sm-2">
			        				<div class="button_color_add-name">
				        			<label>L</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="size_product[]" multiple value="L">
				        			</div>
				        		</div>	
				        		<div class="col-sm-2">
			        				<div class="button_color_add-name">
				        			<label>XL</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="size_product[]" multiple value="XL">
				        			</div>
				        		</div>	
				        		<div class="col-sm-2">
			        				<div class="button_color_add-name">
				        			<label>XXL</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="size_product[]" multiple value="XXL">
				        			</div>
				        		</div>	
		        			</div>
		        			<div class="row edit_product-size">
		        			<?php foreach ($size as $key => $sizes): ?>
			        			<div class="col-sm-2">
				        			<div class="button_size-name">	
				        				<?php echo $sizes['size_product'] ?>
				        			</div>
				        			<div class="button_size-delete">
					        			<a href="{{ url('/admin/size/destroy', 
				        				['id' => $sizes['size_id'], 'id_product' => $id_product]) }}">
				        				Delete
				        			</a>
				        			</div>
			        			</div>
		        			<?php endforeach ?>
		        			</div>
		        		</div>
		        		<div class="col-sm-6">
		        			<label>Color Product / <small><a id="add_color_toggle" href="javascript:void(0)">Add Color</a></small></label>
		        			<div id="add_color_toggle1" style="display: none;" class="row edit_product-color">

			        			<div class="col-sm-3">
			        				<div class="button_color_add-name">
				        			<label>Xanh</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="color_product[]" multiple value="Xanh">
				        			</div>
				        		</div>	
				        		<div class="col-sm-3">
			        				<div class="button_color_add-name">
				        			<label>Do</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="color_product[]" multiple value="Do">
				        			</div>
				        		</div>	
				        		<div class="col-sm-3">
			        				<div class="button_color_add-name">
				        			<label>Den</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="color_product[]" multiple value="Den">
				        			</div>
				        		</div>	
				        		<div class="col-sm-3">
			        				<div class="button_color_add-name">
				        			<label>Trang</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="color_product[]" multiple value="Trang">
				        			</div>
				        		</div>	
				        		<div class="col-sm-3">
			        				<div class="button_color_add-name">
				        			<label>Vang</label>
				        			</div>
				        			<div class="button_color_add-checkbox">
				        			<input type="checkbox" name="color_product[]" multiple value="Vang">
				        			</div>
				        		</div>	
		        			</div>
		        			<div class="row edit_product-color">
		        				<?php foreach ($color as $key => $colors): ?>
			        			<div class="col-sm-3 button_color">
			        			<div class="button_color-name">
			        				<?php echo $colors['color_product'] ?>
			        			</div>
			        			<div class="button_color-delete">
				        			<a href="{{ url('/admin/color/destroy', 
				        				['id' => $colors['id'], 'id_product' => $id_product]) }}">
				        				Delete
				        			</a>
			        			</div>
			        			</div>
		        				<?php endforeach ?>
			        			
		        			</div>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<label>Introduction Product</label>
		        		<textarea name="description_product" >The following example shows how to get a three equal-width columns starting at tablets and scaling to large desktops. On mobile phones or screens that are less than 768px wide, the columns will automatically stack:
		        		</textarea>
		        		</div>
		        	</div>
		        	<div class="row edit_product-avatar">

		        		<div class="col-sm-12">
		        			<label>Avatar Product</label>
		        			<input type="file" name="avatar_product">
		        			<img src="<?php echo url('../storage/app/upload', ['img' => $value['product_img']]) ?>">
		        		</div>
		        	</div>
		        	<div class="row edit_product-library">
		        		<div class="col-sm-12">
		        			<label>Library Product</label><br>
		        			<input type="file" name="library_product[]" multiple>
		        			<?php foreach ($library as $key => $librarys): ?>
		        				<img src="<?php echo url('../storage/app/upload', ['img' => $librarys['name_img']]) ?>">
		        			<?php endforeach ?>
		        		</div>
		        	</div>
		        	<?php endforeach ?>
		        	<div class="row edit_product-submit">
		        		<button type="submit">Change Edit</button>
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