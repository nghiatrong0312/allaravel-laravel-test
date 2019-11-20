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
        <h4 class="card-title">Products Table / <small><a href="{{ url('/admin/product/create') }}">Create</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Name Product
              </th>
              <th>
                Price Product
              </th>
              <th>
                Avatar Product
              </th>
              <th>
                Time Update
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
              <?php foreach ($product as $key => $products): ?>

              <tr>
                <td>
                	<?php echo $products['product_name'] ?>
                </td>
                <td>
                	<?php echo $products['product_price'] ?>
                </td>
                <td style="width: 30%;">
                	<img src="<?php echo url('../storage/app/upload', ['img' => $products['product_img']]) ?>">
                </td>
                <td>
                	<?php echo $products['created_at'] ?>
                </td>
                <td class="text-right">
                	<a href="{{ url('/admin/product/viewdetail', ['id' => $products['id_product']]) }}">
                    <i class="now-ui-icons files_box"></i>
                  </a>
                  <a href="{{ url('admin/product/destroy', ['id' => $products['id_product']]) }}">
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