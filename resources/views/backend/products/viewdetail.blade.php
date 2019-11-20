@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\User;
$name_product = 0;
$id_product = 0;
foreach ($products as $key => $value) {
 	$name_product = $value['product_name'];
    $id_product = $value['id_product'];
    $avatar_product = $value['product_img'];
 } 
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="container">
    <div class="card">
      <div class="card-header">

        <h4 class="card-title"><img src="<?php echo url('../storage/app/upload', ['img' => $avatar_product]) ?>"></h4>
       <h4 class="card-title"> <small><a href="{{ url('/admin/product/viewall') }}">Back</a> / <a href="{{ url('/admin/product/editview', ['id' => $id_product]) }}">Edit Product</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive viewdetail-body">
          	<button class="tablink" onclick="openContent('info', this, '#f96332')" id="defaultOpen">Information</button>
          	<button class="tablink" onclick="openContent('library', this, '#f96332')" id="button_2">Library</button>
          	<button class="tablink" onclick="openContent('sold_out', this, '#f96332')" id="button_1">Sold</button>
        </div>
        <div class="tabcontent viewdetail-body-info" id="info">
            <?php foreach ($products as $key => $product): ?>
        	<img src="">
        	<div class="row">
        		<div class="col-sm-6">
        			<label>Name Product</label>
        			<input type="text" disabled="" value="<?php echo $name_product ?>" name="">
        		</div>
        		<div class="col-sm-6">
        			<label>Price Product</label>
        			<input type="text" disabled="" value="<?php echo number_format($product['product_price'], 0, ',', '.'); ?>" name="">
        		</div>
        	</div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Categories Product</label>
                    <?php foreach ($category as $key => $categorys): ?> 
                    <input type="text" disabled="" value="<?php echo $categorys['categories_name'] ?>" name="">
                    <?php endforeach ?>
                </div>
                <div class="col-sm-4">
                    <label>Brand Product</label>
                    <input type="text" disabled="" value="<?php echo $product['brand_product'] ?>" name="">
                </div>
                <div class="col-sm-4">
                    <label>Quantity Product</label>
                    <input type="text" disabled="" value="<?php echo $product['quantity_product'] ?>" name="">
                </div>
            </div>
        	<div class="row">
        		<div class="col-sm-6">
                    <label>Size Product</label>
                    <div class="row edit_product-size">
                        <?php foreach ($size as $key => $sizes): ?>
                        <div class="col-sm-2">
                            <div class="button_size-name">  
                                <?php echo $sizes['size_product'] ?>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Color Product</label>

                    <div class="row edit_product-color">
                        <?php foreach ($color as $key => $colors): ?>
                        <div class="col-sm-3 button_color">
                        <div class="button_color-name">
                            <?php echo $colors['color_product'] ?>
                        </div>
                        </div>
                        <?php endforeach ?>
                        
                    </div>
                </div>
        		
        	</div>
            
        	<div class="row">
        		<div class="col-sm-12">
        			<label>Introduction Product</label>
        		<textarea disabled=""><?php echo $product['describe_product'] ?></textarea>
        		</div>
        	</div>
            <?php endforeach ?>
        </div>
        <div class="tabcontent viewdetail-body-library" id="library">
        	<div class="row">
                <?php foreach ($library as $key => $librarys): ?>
  
        		<div class="col-sm-3">
        			<img src="<?php echo url('../storage/app/upload', ['img' => $librarys['name_img']]) ?>">
        		</div>
        		
                <?php endforeach ?>
        	</div>
        </div>
        <div class="tabcontent viewdetail-body-sold_out" id="sold_out">
            <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Name Customer 
              </th>
              <th>
                Quantity
              </th>
              <th>
                MemberShip
              </th>
              <th>
                Time Sold Out
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
            <?php foreach ($sold as $key => $solds): ?>
            <?php $customer = User::where(['id' => $solds['id_customer']])->get(); ?>
            <tr>

                <?php foreach ($customer as $key => $customers): ?>
                <td>
                    <?php echo $customers['lastname']. ' ' . $customers['firstname'] ?>
                </td>
                <?php endforeach ?>

                <td>
                    <?php echo $solds['quantity'] ?>
                </td>
                <td>
                    Gold
                </td>
                <td>
                    12:00, 30-12-2019
                </td>
                <td class="text-right">
                    <a href=""><i class="now-ui-icons files_box"></i></a>
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
