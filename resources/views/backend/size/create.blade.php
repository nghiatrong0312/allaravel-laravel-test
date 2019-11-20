@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
$id_products = 0;
foreach ($id_product as $key => $value) {
	if ($value['id_product'] == null) {
		$id_products = 1;
	} elseif ($value['id_product'] != 0) {
		$id_products = $value['id_product'];
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
        <h4 class="card-title">Add Size / <small><a href="">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
    		<div class="viewdetail-body-info">
    			<form method="POST"  action="{{ route('size.store') }}">
    			@csrf	
		        	<div class="row">
		        		<div class="col-md-5">
			        		<label>ID Product</label>
			        		<input type="text" name="id_product" value="<?php echo ++$id_products; ?>">
			        		<label style="margin-top: 20px;">Choose Size</label>
			        		<div class="row">
				        		<div class="col-sm-2">
				        			<p>S</p>
				        			<input type="checkbox" name="size_product[]" multiple value="s">
				        		</div>	
				        		<div class="col-sm-2">
				        			<p>M</p>
				        			<input type="checkbox" name="size_product[]" multiple value="m">
				        		</div>
				        		<div class="col-sm-2">
				        			<p>L</p>
				        			<input type="checkbox" name="size_product[]" multiple value="l">
				        		</div>
				        		<div class="col-sm-2">
				        			<p>XL</p>
				        			<input type="checkbox" name="size_product[]" multiple value="xl">
				        		</div>
				        		<div class="col-sm-2">
				        			<p>XXL</p>
				        			<input type="checkbox" name="size_product[]" multiple value="xxl">
				        		</div>	

			        		</div>
			        		<div class="create_size-submit">
			        			<button type="submit">Create</button>
			        		</div>
		        		</div>        		
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