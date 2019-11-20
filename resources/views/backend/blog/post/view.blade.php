@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')

<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header categories_page">
        <h4 class="card-title">Blog Post / <small><a id="create_categories" href="{{ url('admin/blogpost/create') }}">Create</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive view_post">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                
              </th>
              <th>
                Tittle
              </th>
              <th>
                Categories
              </th>
              <th>
              	Create Time
              </th>
              <th class="text-right">
                
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
            	<?php 
            	use App\Blog_Categories; 
            	$categories_name =0;
            	?>
            	<?php foreach ($post as $key => $posts): ?>
            	<?php $categories = Blog_Categories::where(['id' => $posts['categories_id']])->get(); ?>
            	<?php foreach ($categories as $key => $category): ?>
            	<?php $categories_name = $category['categories']; ?>
            	<?php endforeach ?>
            	<tr>
            		<td><img src="<?php echo url('../storage/app/upload', ['img' => $posts['avatar']]) ?>"></td>
            		<td><?php echo $posts['tittle'] ?></td>
            		<td><?php echo $categories_name ?></td>
            		<td><?php echo $posts['time'] ?></td>
            		<td class="text-right">
            			<a href="{{ url('admin/blogpost/viewpost', ['id' => $posts['id']]) }}"><i class="now-ui-icons design-2_ruler-pencil"></i></a>
            		</td>
            		<td class="text-right">
            			<a href=""><i class="now-ui-icons ui-1_simple-remove"></i></a>
            		</td>
            	</tr>

              	<?php endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection