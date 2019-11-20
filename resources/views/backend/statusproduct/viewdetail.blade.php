@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\Products;
$id_product = $total_price = 0;
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Orders Detail / <small><a href="{{ url('admin/statusproduct/view') }}">Back</a></small></h4>
      </div>
            <div class="card-body">
        <div class="table-responsive viewdetail-body">
          	<button class="tablink" onclick="openContent('info', this, '#f96332')" id="defaultOpen">Information</button>
          	<button class="tablink" onclick="openContent('library', this, '#f96332')" id="button_2">Orders Detail</button>
          	<button class="tablink" onclick="openContent('sold_out', this, '#f96332')" id="button_1">Products Purchased</button>
        </div>
        <div class="tabcontent viewdetail-body-info" id="info">
        	<?php foreach ($customer as $key => $customers): ?>	      	
        	<img src="">
        	<div class="row">
        		<div class="col-sm-6">
        			<label>Name Customer</label>
        			<input type="text" disabled="" value="<?php echo $customers['lastname']. ' '. $customers['firstname'] ?>" name="">
        		</div>
        		<div class="col-sm-6">
        			<label>Address</label>
        			<input type="text" disabled="" value="" name="">
        		</div>
        	</div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Email</label>
                    <input type="text" disabled="" value="" name="">

                </div>
                <div class="col-sm-4">
                    <label>PhoneNumber</label>
                    <input type="text" disabled="" value="" name="">
                </div>
                <div class="col-sm-4">
                    <label>Member Ship</label>
                    <input type="text" disabled="" value="Custumer" name="">
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="tabcontent viewdetail-body-library" id="library">
        	<div class="card-body viewdetail_status">
		        <div class="table-responsive">
		          <table class="table table-striped">
		            <thead class=" text-primary">
		            	<th></th>
						<th>
						Name Product
						</th>
						<th>
						Price Product
						</th>
						<th>
						Quantity
						</th>
						<th>
						Color
						</th>
						<th>
						Size
						</th>
						<th>
						Total Price
						</th>
		            </thead>
		            
		            <tbody>
		            	<?php foreach ($order_product as $key => $order_products): ?>
		            	<?php $id_product = $order_products['id_product']; ?>
		            	<?php $product = Products::where(['id_product' => $id_product])->get(); ?>
						<tr>
							<?php foreach ($product as $key => $value): ?>
							<?php $total_price = $order_products['quantity']*$value['product_price']; ?>
							<td><img style="height: auto; border-radius:0px;" src="<?php echo url('../storage/app/upload', ['img' => $value['product_img']]) ?>"></td>
							<td><?php echo $value['product_name'] ?></td>
							<td><?php echo number_format($value['product_price'], 0, '.', ',') ?></td>
							<td><?php echo $order_products['quantity'] ?></td>
							<td>Red</td>
							<td>M</td>
							<td><?php echo number_format($total_price, 0, ',', '.') ?></td>

							<?php endforeach ?>
						</tr>
						<?php endforeach ?>
		            
		            </tbody>
		          </table>
		        </div>
		      </div>
        </div>
        <div class="tabcontent viewdetail-body-sold_out" id="sold_out">
            <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Name Customer 
              </th>
              <th>
                Name Product
              </th>
              <th>
                Price Product
              </th>
              <th>
                Time Sold Out
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
              
            <tr>
                <td>
                    Tran Trong Nghia    
                </td>
                <td>
                    Quan dui
                </td>
                <td>
                    300.000
                </td>
                <td>
                    12:00, 30-12-2019
                </td>
                <td class="text-right">
                    <a href=""><i class="now-ui-icons files_box"></i></a>
                </td>
            </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
@endsection