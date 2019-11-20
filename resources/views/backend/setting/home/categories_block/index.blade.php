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
        <h4 class="card-title">Categories Block / <small style="font-size: 15px"><a href="{{ url('/admin/setting/home') }}">Back</a></small></h4>
        <form id="update_categories" method="POST" enctype="multipart/form-data" action="{{ route('background.update') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                  <label>Name</label>
                <input placeholder="Enter Tittle" id="categories_name" type="text" class="form-control" name="categories_name">
                </div>
                <div class="col-sm-6">
                  <label>Link Button</label>
                <input placeholder="Enter Link" id="categories_link" type="text" class="form-control" name="categories_link">
                </div>
                <div class="col-sm-12">
                <label>Background</label>
                <input type="file" id="categories_background" class="form-control" name="categories_background">
                </div >
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button id="mnb" type="submit" >Update</button>
            </div>
            <hr>
        </form>
        <form id="update_incentives">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                  <label>Tittle</label>
                <input placeholder="Enter Tittle" id="incentives_tittle" type="text" class="form-control" name="categories_name">
                </div>
                <div class="col-sm-6">
                  <label>Content</label>
                <input placeholder="Enter Link" id="incentives_content" type="text" class="form-control" name="categories_link">
                </div>
                <div class="col-sm-12">
                <label>Link</label>
                <input type="text" id="incentives_link" class="form-control" name="incentives_link">
                </div >
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button id="mnb" type="submit" >Update</button>
            </div>
            <hr>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive" id="content_categories_block">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Background
              </th>
              <th>
                Categories Name
              </th>
              <th>
                Link Button
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>

              <?php foreach ($categories_block_data as $key => $categories_block_datas): ?>
              <tr>
                <td>
                  <img src="<?php echo url('../storage/app/upload', ['img' => $categories_block_datas['background']]) ?>">
                </td>
                <td>
                  <?php echo $categories_block_datas['categories_name'] ?>
                  
                </td>
                <td>
                  <?php echo $categories_block_datas['link'] ?>
                </td>
                <td class="text-right">
                  <a href="" id="update_categories<?php echo $categories_block_datas['id'] ?>">
                    <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <h4 style="text-align: center; text-transform: uppercase;">incentives</h4>
         <div class="table-responsive ">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Tittle
              </th>
              <th>
                Content
              </th>
              <th>
                Link Button
              </th>
              <th>
                Time Update
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
              <?php foreach ($incentives_data as $key => $incentives_datas): ?>
              <tr>
                <td>
                  <?php echo $incentives_datas['tittle'] ?>
                </td>
                <td>
                  <?php echo $incentives_datas['content'] ?>
                </td>
                <td>
                  <?php echo $incentives_datas['link'] ?>
                </td>
                <td>
                  <?php echo $incentives_datas['updated_at'] ?>
                </td>
                <td class="text-right">
                  <a href="" id="incentives_get">
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
  $(document).ready(function(){
    <?php foreach ($categories_block_data as $key => $value): ?>
    
    $('#update_categories<?php echo $value['id'] ?>').click(function(event){
      event.preventDefault();
      $('#update_categories').fadeToggle();
      $('#categories_name ').focus();
      $('#categories_name').val('<?php echo $value['categories_name'] ?>');
      $('#categories_link').val('<?php echo $value['link'] ?>');

      $('#update_categories').submit(function(event){
        $.ajax({
          url:'<?php echo url('admin/setting/home/categories_block/update') ?>/' + <?php echo $value['id'] ?>,
          type:'post',
          dataType: 'json',
          data : {
            "_token": "{{ csrf_token() }}",
            name:$('#categories_name').val(),
            link:$('#categories_link').val(),
            background:$('#categories_background').val(),
          },
        });
        return true;
      });

    });
    <?php endforeach ?>

    <?php foreach ($incentives_data as $key => $value): ?>

    $('#incentives_get').click(function(event){
      event.preventDefault();
      $('#update_incentives').fadeToggle();
      $('#update_categories').hide();
      $('#incentives_tittle ').focus();
      $('#incentives_tittle').val('<?php echo $value['tittle'] ?>');
      $('#incentives_link').val('<?php echo $value['link'] ?>');
      $('#incentives_content').val('<?php echo $value['content'] ?>');

      $('#update_incentives').submit(function(event){
        event.preventDefault();
        var form_data_incentives = $(this).serialize();
        $.ajax({
          url:'<?php echo url('admin/setting/home/incentives/update') ?>/' + <?php echo $value['id'] ?>,
          type:'post',
          dataType: 'json',
          data : form_data_incentives,
        });
        return location.reload();
      });

    });
    <?php endforeach ?>
  });
</script>
@endsection
