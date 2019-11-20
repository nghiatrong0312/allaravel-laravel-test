@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Post Create / <small><a href="{{ url('/admin/product/viewall') }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
    		<div class="viewdetail-body-info">
    			<form method="POST" enctype="multipart/form-data" action="{{ route('post.store') }}">
    			@csrf	
    				<?php if (Auth::check()): ?>
    					<?php $user = Auth::user(); ?>
    				<?php endif ?>
		        	<div class="row">
		        		<input style="display: none" type="text" name="user_id" value="<?php echo $user['id'] ?>">
		        		<div class="col-sm-6">
		        			<label>Tittle</label>
		        			<input type="text" value="" name="tittle">
		        			<p class="help is-danger">{{ $errors->first('tittle') }}</p>
		        		</div>
		        		<div class="col-sm-6">
		        			<label>Categories</label>
		        			<select name="categories">
		        				<option> -- Select Categories -- </option>
		        				<?php foreach ($blog_categories as $key => $blog_category): ?>		        					
		        				<option value="<?php echo $blog_category['id'] ?>" >
		        					<?php echo $blog_category['categories'] ?>
		        				</option>
		        				<?php endforeach ?>

		        			</select>
		        			<p class="help is-danger">{{ $errors->first('categories') }}</p>
		        		</div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-12">
		        			<label>Content</label>
		        		<textarea name="content" id="editor1">
		        		</textarea>
		        		<p class="help is-danger">{{ $errors->first('content') }}</p>
		        		</div>
		        	</div>
		        	<div class="row edit_product-avatar">
		        		<div class="col-sm-12">
		        			<label>Avatar Product</label>
		        			<input type="file" name="post_avatar">
		        			<p class="help is-danger">{{ $errors->first('post_avatar') }}</p>
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