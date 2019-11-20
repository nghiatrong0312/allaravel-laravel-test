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
        <h4 class="card-title">About Page /<small><a href="{{ url('/admin') }}">Exit</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive viewdetail-body">
            <button class="tablink" onclick="openContent('info', this, '#f96332')" id="defaultOpen">Information</button>
            <button class="tablink" onclick="openContent('library', this, '#f96332')" id="button_2">Service</button>
        </div>
        <div class="tabcontent viewdetail-body-info" id="info">
          <?php foreach ($about_data as $key => $about_datas): ?>  
          <form method="POST" enctype="multipart/form-data" action="{{ url('admin/setting/about/update', ['id' => $about_datas['id']]) }}">
          @csrf
          
            <?php $id_about = $about_datas['id'] ?>
            <div class="row col-md-12" id="about_media">
              <?php echo $about_datas['media'] ?>
              <label>Link Media</label>
              <textarea name="about_link" ><?php echo $about_datas['media'] ?></textarea>
            </div>
            <div class="row" id="about_picture">
            <div class="col-md-6"> 
              <label>Banner Picture</label>
              <img src="{{ url('../storage/app/upload', ['img' => $about_datas['banner']]) }}">
              <input type="file" name="about_banner">
            </div>
            <div class="col-md-6"> 
              <label>Background Picture</label>
              <img src="{{ url('../storage/app/upload', ['img' => $about_datas['background']]) }}">
              <input type="file" name="about_background">
            </div>
            </div>
            <div class="col-md-12" id="about_introduction"> 
              <label>Introduction Content</label>
              <textarea name="about_introduction"><?php echo $about_datas['introduction'] ?></textarea>
            </div>
          <?php endforeach ?>
          <button style="border-radius: 10px;">Change</button>
          </form>
        </div>
        <div class="tabcontent viewdetail-body-library" id="library">
          <div class="row" id="about_service">
            <div class="card-header categories_page">
              <div id="noted-header_bar">
              @if ( Session::has('note_service') )
              <small style="color: red">
                "{{ Session::get('note_service') }}"
              </small>   
              @endif
              </div>
              <form id="update_service">
                    @csrf
                  <div class="row form-group">
                      <div class="col-sm-6">
                        <label>tittle</label>
                        <input placeholder="Enter Tittle" id="tittle" type="text" class="form-control" name="service_tittle">
                        <p class="help is-danger">{{ $errors->first('service_tittle') }}</p>
                      </div>
                      <div class="col-sm-6">
                        <label>Icon</label>
                        <input placeholder="Enter Icon" id="icon" type="text" class="form-control" name="service_icon">
                        <p class="help is-danger">{{ $errors->first('service_icon') }}</p>
                        <p style="color: #888">Click <a href="">Here</a> To Take Icon</p>
                      </div>
                      <div class="col-sm-12">
                        <label>Content</label>
                        <textarea placeholder="Enter Content" id="content" name="service_content"></textarea>
                        <p class="help is-danger">{{ $errors->first('service_content') }}</p>
                      </div>
                  </div>
                  <div class="categories_page-create_submit" style="width: 70%">
                  <button type="submit" >Update</button>
                  </div>
                  <hr>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class=" text-primary">
                  <th>
                    Tittle
                  </th>
                  <th>
                    Icon
                  </th>
                  <th>
                    Content
                  </th>
                  <th>
                    Created Time
                  </th>
                  <th class="text-right">
                    
                  </th>
                </thead>
                
                <tbody>

                  <?php foreach ($service_data as $key => $service_datas): ?>   
                    
                  <tr>
                    <td>
                      <?php echo $service_datas['tittle'] ?>
                    </td>
                    <td>
                      <?php echo $service_datas['icon'] ?>
                    </td>
                    <td>
                      <?php echo $service_datas['content'] ?>
                    </td>
                     <td>
                      <?php echo $service_datas['created_at'] ?>
                    </td>
                    <td class="text-right">
                      <a href="" id="get<?php echo $service_datas['id'] ?>">
                        <i  class="now-ui-icons arrows-1_cloud-upload-94"></i>
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
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    <?php foreach ($service_data as $key => $value): ?>
    $('#get<?php echo $value['id'] ?>').click(function(event){
        var id = <?php echo $value['id'] ?>;
        event.preventDefault();
        $('#update_service').fadeToggle();
        $('#tittle').focus();
        $('#tittle').val('<?php echo $value['tittle'] ?>');
        $('#icon').val('<?php echo $value['icon'] ?>');
        $('#content').html('<?php echo $value['content'] ?>');

        $('#update_service').submit(function(event){
          event.preventDefault();
          var form_update = $(this).serialize();
          $.ajax({
          url:'<?php echo url('/admin/setting/about/service/') ?>/' + id,
          type:'post',
          dataType: 'json',
          data: form_update,
          });
          return location.reload();
        });
    });
    

    <?php endforeach ?>
  });
</script>
@endsection

