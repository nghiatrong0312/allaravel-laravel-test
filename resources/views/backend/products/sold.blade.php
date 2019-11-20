@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\User;
$id_user = 0;
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Sold Product</h4>
      </div>
      <div class="card-body">
      		<div class="col-sm-12 status_product-badgets">
      			<ul class="list-group">
					<div class="table-responsive" style="display: block;">
					<table class="table table-striped">
					  <thead class=" text-primary">
					    <th>
					      Name Customer
					    </th>
					    <th>
					      Price Total
					    </th>
					    <th>
					      Quantity
					    </th>
					    <th>
					      Sold Time
					    </th>
					    <th class="text-right">
					      
					    </th>
					  </thead>
					  
					  <tbody>
					  	<?php foreach ($sold_order as $key => $sold_orders): ?>
					  	<?php $customer = User::where(['id' => $sold_orders['id_customer']])->get();?>
					    <tr>
					    	<?php foreach ($customer as $key => $customers): ?>
					    	<td><?php echo $customers['lastname']. ' '. $customers['firstname'] ?></td>
					    	<td><?php echo $sold_orders['total_price'] ?></td>
					    	<td><?php echo $sold_orders['total_quantity'] ?></td>
					    	<td><?php echo $sold_orders['time'] ?></td>
					    	<td></td>
					    	<?php endforeach ?>
					    </tr>
					    <?php endforeach ?>
					  </tbody>
					</table>
					</div>
      			</ul>
      		</div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection