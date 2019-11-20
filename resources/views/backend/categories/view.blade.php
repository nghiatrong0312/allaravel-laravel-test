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
        <h4 class="card-title">Categories Table / <small><a href="{{ url('/admin/categories') }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        	<div class="col-md-6 categories_update">
        		<?php foreach ($categories as $key => $category): ?>
	        	<form method="POST" action="{{ url('admin/categories/update', ['id' => $category['id_categories']]) }}">
	        		@csrf
				    <div class="form-group">
				      <label for="usr">Categories Name</label>
				      <input type="text" class="form-control" name="name_categories" value="<?php echo $category['categories_name'] ?>" id="usr">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Time Upload</label>
				      <input type="text" disabled="" value="<?php echo $category['created_at'] ?>" class="form-control" id="pwd">
				    </div>
				    <button type="submit" >Change</button>
				</form>
				<?php endforeach ?>

			</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection