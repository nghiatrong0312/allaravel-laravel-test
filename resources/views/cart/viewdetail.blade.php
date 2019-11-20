@extends('welcome')
@section('navbar')
@section('content')
<div class="row">
	<div class="col-sm-12 tittle" style="position: absolute;">
	<h1>Cart</h1>
	</div>
	<img style="width: 100%;" src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
	<div class="container">
		<div class="table-responsive cart">
          <table class="table">
            <thead class=" text-primary">
              <th>
                
              </th>
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
                Total
              </th>
              <th>
                
              </th>
            </thead>
            
            <tbody>
              <?php if (isset($infocart)): ?>
              <?php $id_product = $amount_total = $total = $total_price = 0; ?>

              <?php foreach ($infocart as $key => $infocarts): ?>
              <?php 
                    $amount_total += $infocarts['amount'];
                    $id_product = $infocarts['product_id'];
                    $total = $infocarts['product_price']*$infocarts['amount'];
                    $total_price += $total;
              ?>
              <div>
                  
              </div>
              <tr>
                <td style="width: 20%; height: 200px;">
                  <img src="<?php echo url('../storage/app/upload/', ['img' => $infocarts['product_img']]) ?>">
                </td>
                <td>
                  <p><?php echo $infocarts['product_name'] ?></p>
                </td>
                <td>
                	<p><?php echo number_format($infocarts['product_price'], '0', ',', '.') ?></p>
                </td>
                <td>
                  <p style="padding-top: 70px;">
                  <div class="col-sm-12 detail_product-info-quantity_addcart">
                    <div class="col-sm-9 detail_product-info-quantity_addcart-quantity">
                      <div class="input-group input-number-group">
                        <div class="input-group-button">
                          <span id="get1_quantity<?php echo $infocarts['product_id'] ?>" class="input-number-decrement">-</span>
                        </div>
                        <input class="input-number" min="1" id="quantity_data<?php echo $infocarts['product_id'] ?>" type="number" value="<?php echo $infocarts['amount'] ?>">
                        <div class="input-group-button">
                          <span id="get2_quantity<?php echo $infocarts['product_id'] ?>" class="input-number-increment">+</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  </p>       
                </td>
                <td>
                	<p id="total_amount<?php echo $infocarts['product_id'] ?>"><?php echo number_format($total, '0', ',', '.') ?></p>
                </td>
                <td>
                    <p><a href="{{ url('cart/destroy', ['id' => $infocarts['product_id']]) }}"><i class="fa fa-remove"></i></a></p>
                </td>
              </tr>
              <?php endforeach ?>
              
              
            </tbody>

          </table>
          <div class="container cart-button_order">
            <div class="col-sm-12">
              <?php  
              $id_customer = 0;
              $id_order = 0;
              foreach ($order as $key => $orders) {
                if (empty($orders['id'])) {
                  $id_order = 1;
                }else {
                  $id_order = $orders['id'];
                }
              }
              if (Auth::check()) {
                $user = Auth::user();
                $id_customer = $user['id'];
              }
              ?>
              
              <input style="display:none;" type="text" name="id_customer" value="<?php echo $id_customer ?>">
              <input style="display:none;" type="text" name="id_product" value="<?php  echo $id_product;?>">
              <input style="display:none;" type="text" name="total_amount" value="<?php echo $amount_total ?>">
              <input style="display:none;" type="text" name="total_price" value="<?php echo $total_price ?>">
              <input style="display:none;" type="text" name="order_id" value="<?php echo ++$id_order ?>">
              
              
              <form method="GET" action="{{ url('/cart/checkout') }}">
                @csrf
                <div id="incentives_code">
                <input type="text" placeholder="Gift Code" name="gift_code">
                <button>Checkout</button>
                </div>   
              </form>
              <?php endif ?>
            </div>
          </div>
      </div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      <?php foreach ($infocart as $key => $value): ?>

      $('#get1_quantity<?php echo $value['product_id'] ?>').click(function(){
          var quantity = $('#quantity_data<?php echo $value['product_id'] ?>').val();
          var total_amount = quantity*<?php echo $value['product_price'] ?>;
          $('#total_amount<?php echo $value['product_id'] ?>').html(total_amount);
          $.ajax({
            url:'<?php echo url('/cart/getquantity') ?>',
            method:'get',
            dataType: 'html',
            data: {
              id:<?php echo $value['product_id'] ?>,
              quantity_pro:quantity,
              total_amount:total_amount,
              price:<?php echo $value['product_price'] ?>
            },
          });
          setTimeout(function(){
          $('#total_bill').load('<?php echo url('/cart/setotalbill') ?>').fadeIn('slow');
          }, 100);
          setTimeout(function(){
            $('#amount').load('<?php echo url('/cart/setquantity') ?>').fadeIn('slow');
          }, 100);
          setTimeout(function(){
            $('#amount2').load('<?php echo url('/cart/setquantity') ?>').fadeIn('slow');
          }, 100);
      });
      $('#get2_quantity<?php echo $value['product_id'] ?>').click(function(){
          var quantity = $('#quantity_data<?php echo $value['product_id'] ?>').val();
          var total_amount = quantity*<?php echo $value['product_price'] ?>;
          $('#total_amount<?php echo $value['product_id'] ?>').html(total_amount);
          $.ajax({
            url:'<?php echo url('/cart/getquantity') ?>',
            method:'get',
            dataType: 'html',
            data: {
              id:<?php echo $value['product_id'] ?>,
              quantity_pro:quantity,
              total_amount:total_amount,
              price:<?php echo $value['product_price'] ?>
            },
          });
          setTimeout(function(){
          $('#total_bill').load('<?php echo url('/cart/setotalbill') ?>').fadeIn('slow');
          }, 100);
          setTimeout(function(){
            $('#amount').load('<?php echo url('/cart/setquantity') ?>').fadeIn('slow');
          }, 100);
          setTimeout(function(){
            $('#amount2').load('<?php echo url('/cart/setquantity') ?>').fadeIn('slow');
          }, 100);

      });
      <?php endforeach ?>
  });
</script>
@endsection
