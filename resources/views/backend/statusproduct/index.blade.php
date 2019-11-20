@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\User;
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Status Product</h4>
      </div>
      <div class="card-body status_product">
      		<div class="col-sm-12 status_product-badgets">
      			<ul class="list-group">
      				<li id="waiting_confimation_click" class="list-group-item">Orders waiting confimation<span class="badge"><?php echo $quantity_waiting_confimation ?></span></li>
              <div class="table-responsive" id="waiting_confimation_active">
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
                      Orders Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>

                    <?php foreach ($waiting_confimation as $key => $waiting_confimations): ?>
                    <?php $user_waiting_confimation = User::where(['id' => $waiting_confimations['id_customer']])->get() ?>
                    <tr>
                      <?php foreach ($user_waiting_confimation as $key => $user_waiting_confimations): ?>
                      <td>
                        <?php echo $user_waiting_confimations['lastname']. ' ' . $user_waiting_confimations['firstname'] ?>
                      </td>
                      <?php endforeach ?>
                      <td>
                        <?php echo number_format($waiting_confimations['total_price']) ?>
                      </td>
                      <td>
                        <?php echo $waiting_confimations['total_quantity'] ?>
                      </td>
                      <td>
                        <?php echo $waiting_confimations['time'] ?>
                      </td>
                      <td class="text-right">
                         <a href="{{ url('admin/statusproduct/viewdetail', [
                         'id' => $waiting_confimations['id'],'id_customer' => $user_waiting_confimations['id']]) }}">
                          <i class="now-ui-icons files_box"></i>
                        </a>
                      </td >
                      <td class="text-right">
                        <a href="{{ url('admin/statusproduct/update', ['id' => $waiting_confimations['id']]) }}">
                          <i class="now-ui-icons shopping_delivery-fast"></i>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach ?>

                  </tbody>
                </table>
              </div>
      			</ul>
      		</div>
      		<div class="col-sm-12 status_product-badgets">
      			<ul class="list-group">
      				<li id="waiting_delivery_click" class="list-group-item">Orders waiting delivery<span class="badge"><?php echo $quantity_waiting_delivery ?></span></li>
              <div class="table-responsive" id="waiting_delivery_active">
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
                      Orders Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>
                    <?php if (!empty($waiting_delivery)): ?>
                    <?php foreach ($waiting_delivery as $key => $waiting_deliverys): ?>
                    <?php $user_waiting_delivery = User::where(['id' => $waiting_deliverys['id_customer']])->get(); ?>
                    <tr>
                      <?php foreach ($user_waiting_delivery as $key => $user_waiting_deliverys): ?>
                      <td>
                        <?php echo $user_waiting_deliverys['lastname']. ' ' . $user_waiting_deliverys['firstname'] ?>
                      </td>
                      
                      <td>
                        <?php echo number_format($waiting_deliverys['total_price']) ?>
                      </td>
                      <td>
                        <?php echo $waiting_deliverys['total_quantity'] ?>
                      </td>
                      <td>
                        <?php echo $waiting_deliverys['time'] ?>
                      </td>
                      <td class="text-right">
                        <a href="{{ url('admin/statusproduct/viewdetail', ['id' => $waiting_deliverys['id'],'id_customer' => $user_waiting_deliverys['id']]) }}">
                          <i class="now-ui-icons files_box"></i>
                        </a>
                      </td >
                      <?php endforeach ?>
                      <td class="text-right">
                        <a href="{{ url('admin/statusproduct/delivered', ['id' => $waiting_deliverys['id']]) }}">
                          <i class="now-ui-icons ui-2_like"></i>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
      			</ul>
      		</div>
      		<div class="col-sm-12 status_product-badgets">
      			<ul class="list-group">
      				<li id="delivered_click" class="list-group-item">Orders delivered<span class="badge"><?php echo $quantity_delivered ?></span></li>
              <div class="table-responsive" id="delivered_active">
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
                      Orders Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>
                    <?php if (!empty($delivered)): ?>
                    <?php  $id_customer_delivered = 0; ?>                      
                    <?php foreach ($delivered as $key => $delivereds): ?>
                    <?php $id_customer_delivered = $delivereds['id_customer'] ?>
                    <?php $user_delivered = User::where(['id' => $id_customer_delivered])->get(); ?>
                    <tr>
                      <?php foreach ($user_delivered as $key => $user_delivereds): ?>
                      <td>
                        <?php echo $user_delivereds['lastname']. ' ' . $user_delivereds['firstname'] ?>
                      </td>
                      <?php endforeach ?>
                      <td>
                        <?php echo number_format($delivereds['total_price']) ?>
                      </td>
                      <td>
                        <?php echo $delivereds['total_quantity'] ?>
                      </td>
                      <td>
                        <?php echo $delivereds['time'] ?>
                      </td>
                      <td class="text-right">
                         <a href="{{ url('admin/statusproduct/viewdetail', ['id' => $delivereds['id'],'id_customer' => $user_delivereds['id']]) }}">
                          <i class="now-ui-icons files_box"></i>
                        </a>
                      </td >
                      <td class="text-right">
                        <a href="{{ url('admin/statusproduct/sold', ['id' => $delivereds['id']]) }}">
                          <i class="now-ui-icons business_money-coins"></i>
                        </a>
                      </td>
                      
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
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