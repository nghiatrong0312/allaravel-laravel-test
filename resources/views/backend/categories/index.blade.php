@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\Products;
$id_categories = 0;
foreach ($categories as $key => $value) {
    $id_categories = $value['id_categories'];
    $product = Products::where(['categories_id' => $id_categories])->get();

}

?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header categories_page">
        <h4 class="card-title">Categories Table / <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <form id="create_categories1" method="POST" action="{{ route('categories.store') }}">
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
                Quantity Products
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
              <?php foreach ($categories as $key => $category): ?>
              <?php 
                  $id_categories = $category['id_categories']; 
                  $product = Products::where(['categories_id' => $id_categories])->get(); 
              ?>
              <tr>
                <td>
                  <?php echo $category['categories_name'] ?>
                </td>
                <td>
                  <?php echo $category['created_at'] ?>
                </td>
                <td>
                  <?php echo count($product); ?>
                </td>
                <td class="text-right">
                	<a href="{{ url('/admin/product/view', ['id' => $category['id_categories']]) }}">
                    <i class="now-ui-icons files_box"></i>
                  </a>
                  <a href="{{ url('/admin/categories/view', ['id' => $category['id_categories']]) }}">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                  </a>
                  <a href="<?php echo url('/admin/categories/delete', ['id' => $category['id_categories']]) ?>">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                  </a>
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