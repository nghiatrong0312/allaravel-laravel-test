@extends('welcome')
@section('navbar')
@section('content')
<div class="order_page">
	<div class="col-sm-12 tittle" style="position: absolute;">
		<h1>orders detail</h1>
	</div>
	<img style="width: 100%;" src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
    @if ( Session::has('success') )
        <div id="hide" class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="container">
		<div class="table-responsive cart">
          <table class="table">
            <thead class=" text-primary">

              <th>
                
              </th>
              <th>
                Product Name
              </th>
              <th>
                Product Price
              </th>
              <th>
                Quantity
              </th>
              <th>
                Total Price
              </th>
              <th>
                
              </th>
            </thead>
            
            <tbody>

				<?php  
				use App\Products;
				$id_product = $quantity = $total = $status = $id_order = 0;
        $style_button_remove = 'block';
				?>
				<?php foreach ($order as $key => $orders): ?>
        <?php $id_order = $orders['id'] ?>
        <?php 
          foreach ($status_product as $key => $status_products) {

            if ($status_products['status'] != 1) {
              $style_button_remove = 'none';
            }  
          }
        ?>
				<?php $id_product = $orders['id_product']; ?>
				<?php $quantity = $orders['quantity']; ?>	
        <?php $status = $orders['status'] ?>

				<?php $product = Products::where(['id_product' => $id_product])->get(); ?>
				<?php foreach ($product as $key => $value): ?>
				<?php $total = $quantity*$value['product_price']; ?>
              	<tr>
                <td style="width: 20%; height: 200px;">
                  <img src="<?php echo url('../storage/app/upload/', ['img' => $value['product_img']]) ?>">
                </td>
                <td>
                	<p><?php echo $value['product_name']; ?></p>
                </td>
                <td>
                	<p><?php echo number_format($value['product_price'], 0, ',', '.') ?></p>
                </td>
                <td>
                	<p><?php echo $quantity; ?></p>
                </td>
                <td>
                	<p><?php echo number_format($total, 0, ',', '.') ?></p>
                </td>
                <td>
                    <button style="display: <?php echo $style_button_remove ?>" type="button" class="btn btn-primary" onclick="remove(<?php echo $id_product ?>)" data-toggle="modal" data-target="#exampleModal">
                      <i class="fa fa-remove"></i>
                    </button>
                </td>

              	</tr>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div id="info_product"></div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary"><a href="<?php echo url('cart/order/destroy', ['id' => $id_order]) ?>">Remove</a></button>
                        </div>
                      </div>
                  </div>
                </div>
				        <?php endforeach ?>
              	<?php endforeach ?>
            </tbody>
          </table>
          <!-- Modal -->
          
      </div>
	</div>
</div>
<script type="text/javascript">
  function remove(id) 
  {
      var i;
      var xhttp; 
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("info_product").innerHTML = this.responseText;
        }
      };
      xhttp.open('get', '<?php echo url('/getproduct') ?>/' + id , true);
      xhttp.send();
  }
</script>
@endsection