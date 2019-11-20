@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\Blog_Post;
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header categories_page">
        <h4 class="card-title">Blog Categories/ <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <form id="create_categories1" method="POST" action="{{ route('blogcategories.store') }}">
              @csrf
            <div class="form-group">
              <input  type="text" class="form-control" name="name_categories" id="usr">
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button type="submit" >Create</button>
            </div>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Name Categories
              </th>
              <th>
                Time Update
              </th>
              <th>
                Quantity Posts
              </th>
              <th class="text-right">
                
              </th>
              <th class="text-right">
                
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
            <?php foreach ($blog_category as $key => $blog_categories): ?>
            <?php
            $post = Blog_Post::where(['categories_id' => $blog_categories['id']])->get();
            ?>
      				<tr>
      					<td><?php echo $blog_categories['categories'] ?></td>
      					<td><?php echo $blog_categories['time'] ?></td>
      					<td><?php echo count($post); ?></td>
      					<td>
      						<a href="{{ url('admin/blogpost/view', ['id' => $blog_categories['id']]) }}"><i class="now-ui-icons files_box"></i></a>
      					</td>
      					<td>
      						<a href=""><i class="now-ui-icons ui-1_settings-gear-63"></i></a>
      					</td>
      					<td>
      						<a href="{{ url('admin/blogcategories/destroy', ['id' => $blog_categories['id']]) }}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
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