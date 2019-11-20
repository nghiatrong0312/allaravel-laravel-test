@extends('welcome')
@section('navbar')
@section('content')
<div class="order_page">
	<div class="col-sm-12 tittle" style="position: absolute;">
		<h1>Your Orders</h1>
	</div>
	<img style="width: 100%;" src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
    @if ( Session::has('success') )
        <div id="hide" class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
		<div class="table-responsive cart order_page">
          <table class="table">
            <thead class=" text-primary">

              <th>
                Total Quantity
              </th>
              <th>
                Discount
              </th>
              <th>
                Total Price
              </th>
              <th>
                Time
              </th>
              <th>
                Status
              </th>
              <th>
                
              </th>
            </thead>
            
            <tbody>

            	<?php foreach ($order as $key => $orders): ?>
            	<?php  
                $status = 0;
                if ($orders['status'] == 1) {
                  $status = 'Orders waiting confimation';
                }elseif ($orders['status'] == 2) {
                  $status = 'Orders waiting delivery';
                }elseif ($orders['status'] == 3) {
                  $status = 'Orders delivered';
                }elseif ($orders['status'] == 4) {
                  $status = 'Orders delivered';
                }
              ?>	
              	<tr>
                	<td><?php echo $orders['total_quantity'] ?></td>
                  <td><?php echo $orders['discount_percent'] ?>%</td>
                	<td><?php echo number_format($orders['total_price'], 0, ',', '.'); ?></td>
                	<td><?php echo $orders['time'] ?></td>
                	<td><?php echo $status ?></td>
                  <td><a href="{{ url('cart/orderdetail', ['id' => $orders['id']]) }}"><i class="fa fa-folder-o"></i></a></td>
              	</tr>

            	<?php endforeach ?>

            </tbody>
          </table>
          <!-- Modal -->
          
      </div>
	</div>
</div>
@endsection