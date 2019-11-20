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
        <h4 class="card-title">Create Categories / <small><a href="{{ url('/admin/categories') }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        	<div class="col-md-6 categories_update">
	        	<form method="POST" action="{{ route('categories.store') }}">
	        		@csrf
				    <div class="form-group">
				      <label for="usr">Categories Name</label>
				      <input type="text" class="form-control" name="name_categories" id="usr">
				    </div>
				    <button type="submit" >Submit</button>
				</form>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection