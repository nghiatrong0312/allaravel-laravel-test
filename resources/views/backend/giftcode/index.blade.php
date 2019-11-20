@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<?php  
use App\User;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$current_time   = date("Y-m-d H:i:s");
$time_delete    = date('Y-m-d H:i:s',strtotime('+10 minutes',strtotime($current_time)));
?>
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header categories_page">
        <h4 class="card-title">Status Product / <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <div id="noted-header_bar">
          <small>"gift code used will delete in 30 days"</small><br>
        @if ( Session::has('note_create_gift') )
            <small style="color: red;">"{{ Session::get('note_create_gift') }}"</small><br>
        @endif
        @if ( Session::has('note_gift') )
            <small style="color: red;">"{{ Session::get('note_gift') }}"</small><br>
        @endif
        @if ( Session::has('note_gift_update') )
            <small style="color: red;">"{{ Session::get('note_gift_update') }}"</small><br>
        @endif
        <small style="color: red;">{{ $errors->first('giftcode') }}</p></small>
        </div>
        <form id="create_categories1" method="POST" action="{{ url('admin/giftcode/store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                  <label>Gift Code</label>
                <input placeholder="Enter Gift Code" type="text" class="form-control" name="giftcode" id="usr">
                </div>
                <div class="col-sm-6">
                  <label>Discount Percent</label>
                <input placeholder="Discount Percent"  type="text" class="form-control" name="discount" id="usr">
                <input style="display: none" type="text" name="time_delete" value="<?php echo $time_delete ?>">
                </div>
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button type="submit" >Create</button>
            
            </div>
            <hr>
        </form>
      </div>
      <div class="card-body status_product">
      		<div class="col-sm-12 status_product-badgets">
      			<ul class="list-group">
      				<li id="waiting_confimation_click" class="list-group-item">Unused gift code<span class="badge"><?php echo $quantity_unused_gift_code ?></span></li>
              <div class="table-responsive" id="waiting_confimation_active">
                <table class="table table-striped">
                  <thead class=" text-primary">
                    <th>
                      Gift Code
                    </th>
                    <th>
                      Discount Percent
                    </th>
                    <th>
                      Create Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>

         			<?php foreach ($unused_gift_code as $key => $unused_gift_codes): ?>

                    <tr>
                                            
                      <td>
                        <?php echo $unused_gift_codes['code'] ?>
                      </td>
                      <td>
                        <?php echo $unused_gift_codes['discount'] ?>
                      </td>
                      <td>
                        <?php echo $unused_gift_codes['created_at'] ?>
                      </td>
                  
                      <td class="text-right">
                        <a href="{{ url('admin/giftcode/update', ['id' => $unused_gift_codes['id']]) }}">
                          <i class="now-ui-icons ui-1_email-85"></i>
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
      				<li id="waiting_delivery_click" class="list-group-item">gift code gave<span class="badge"><?php echo $quantity_gift_code_gave ?></span></li>
              <div class="table-responsive" id="waiting_delivery_active">
                <table class="table table-striped">
                  <thead class=" text-primary">
                    <th>
                      Gift Code
                    </th>
                    <th>
                      Discount Percent
                    </th>
                    <th>
                      Create Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>

        			<?php foreach ($gift_code_gave as $key => $gift_code_gaves): ?>
                    <tr>
                     
                      <td>
                        <?php echo $gift_code_gaves['code'] ?>
                      </td>
                      <td>
                        <?php echo $gift_code_gaves['discount'] ?>
                      </td>
                      <td>
                        <?php echo $gift_code_gaves['created_at'] ?>
                      </td>

                      <td class="text-right">
                        <a href="{{ url('admin/giftcode/destroy', ['id' => $gift_code_gaves['id']]) }}">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
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
      				<li id="delivered_click" class="list-group-item">gift code used<span class="badge"><?php echo $quantity_gift_code_used ?></span></li>
              <div class="table-responsive" id="delivered_active">
                <table class="table table-striped">
                  <thead class=" text-primary">
                    <th>
                      Gift Code
                    </th>
                    <th>
                      Discount Percent
                    </th>
                    <th>
                      Create Time
                    </th>
                    <th class="text-right">
                      
                    </th>
                  </thead>
                  
                  <tbody>
                  	<?php foreach ($gift_code_used as $key => $gift_code_useds): ?>
                  		
                    <tr>

                      <td>
                      	<?php echo $gift_code_useds['code'] ?>
                      </td>
                      <td>
                      	<?php echo $gift_code_useds['discount'] ?>
                      </td>
                      <td>
                      	<?php echo $gift_code_useds['created_at'] ?>
                      </td>

                      <td class="text-right">
                        <a href="">
                          <i class="now-ui-icons ui-1_simple-remove"></i>
                        </a>
                        
                      </td>
                      
                    </tr>

                    <?php endforeach ?>
                  </tbody>
                </table>
                <a href="{{ url('admin/giftcode/destroy') }}">destroy</a>
              </div>
      			</ul>
      		</div>
      </div>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">

    function expiry_date() {
      alert('hihi');
      // setTimeout(function(){
      // $('#show_comment_content').load('<?php echo url('admin/giftcode/destroy') ?>/').fadeIn('slow');
      // }, 1000);
    };
    
</script>
@endsection