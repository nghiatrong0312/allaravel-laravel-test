@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header categories_page">
        <h4 class="card-title">Sale Block / <small style="font-size: 15px"><a href="{{ url('admin/setting/home') }}">Back</a></small></h4>
        
        <div id="noted-header_bar">
        <small>"Please create expiration date in hour units"</small><br>
        <small id="warning" style="color: red"></small>
        </div>
        <form id="upload_product" method="POST" action="{{ route('header.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
               		<label>Product Name</label>
	                <select id="product_name">
	                	<?php foreach ($product_data as $key => $product_datas): ?>	

						<option value="<?php echo $product_datas['id_product'] ?>">
							<?php echo $product_datas['product_name'] ?>
						</option>

						<?php endforeach ?>
					</select>
                </div>
                <div class="col-sm-6">
                	<label>Discount Percent</label>
                	<input placeholder="Discount Percent"  type="number" class="form-control" name="discount" id="discount">
                </div>

                <div class="col-sm-6">
                	<label>Expiry Date</label>
                	<input placeholder="Expiry Date" type="number" class="form-control" name="expiry_time" id="expiry_time">
                </div >
                <div class="col-sm-6">
                	<label>Quantity</label>
                	<input placeholder="Quantity" type="text" class="form-control" name="quantity" id="quantity">
                </div >
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button type="submit" >Update</button>
            
            </div>
            <hr>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class=" text-primary">
            	<th>
              	</th>
        				<th>
        				Product Name
        				</th>
        				<th>
        				Expiry Date
        				</th>
        				<th>
        				Discount Percent
        				</th>
        				<th>
        				Quantity
        				</th>
        				<th class="text-right">

        				</th>
            </thead>
            
            <tbody>

            	<?php foreach ($product_sale_data as $key => $product_sale_datas): ?>         		
      				<tr>
        					<td style="width: 25%;">
        						<img style="width: 80%;" src="{{ url('../storage/app/upload', ['img' => $product_img_data]) }}">
        					</td>
        					<td>
        						<?php echo $product_name_data ?>
        					</td>
        					<td>
        						<?php echo $product_sale_datas['time'] ?>
        					</td>
        					<td>
        						<?php echo $product_sale_datas['discount'] ?>
        					</td>
        					<td>
        						<?php echo $product_sale_datas['quantity'] ?>
        					</td>
        					<td class="text-right">
        					  <a  href="" id="upload_info<?php echo $product_sale_datas['id'] ?>">
        					    <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
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
<script type="text/javascript">
	<?php foreach ($product_sale_data as $key => $value): ?>
    
    $('#upload_info<?php echo $value['id'] ?>').click(function(event){
      event.preventDefault();
      $('#upload_product').fadeToggle();
      $('#product_name ').focus();

      $('#upload_product').submit(function(event){
      	event.preventDefault();
      	var form_sale = $(this).serialize();
        $.ajax({
          url:'<?php echo url('admin/setting/productsale/update') ?>/' + <?php echo $value['id'] ?>,
          type:'post',
          dataType: 'json',
          data : {
          	"_token": "{{ csrf_token() }}",
          	product_name:$('#product_name').val(),
          	discount:$('#discount').val(),
          	expiry_time:$('#expiry_time').val(),
          	quantity:$('#quantity').val(),
          },
        }).done(function(data){
        	$('#warning').html(data);
          $('#upload_product')[0].reset();
          $('#warning ').focus();
      	});
        $
      });
    });
    <?php endforeach ?>
</script>
@endsection
