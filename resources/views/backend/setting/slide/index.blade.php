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
        <h4 class="card-title">Slide Table</h4>
        <small style="font-size: 15px"><a href="{{ url('/admin/setting/home') }}">Back</a> / <a id="create_categories" href="javascript:void(0)">Create</a></small>
        <div id="noted-header_bar">
        <small>"Only create 5 Slide for The Website"</small>
        </div>
        <form id="create_categories1" enctype="multipart/form-data" method="POST" action="{{ route('slide.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                  <label>Tittle</label>
                <input placeholder="Enter Tittle" type="text" class="form-control" name="slide_tittle" id="usr">
                </div>
                <div class="col-sm-6">
                  <label>Link Button</label>
                <input placeholder="Enter Link"  type="text" class="form-control" name="slide_link" id="usr">
                </div>
                <div class="col-sm-12" id="content_slide">
                  <label>Content</label>
                <textarea name="slide_content" placeholder="Enter Content"></textarea>
                </div >
                <div class="col-sm-12">
                <label>Image</label>
                <input type="file" class="form-control" name="slide_img" id="usr">
                </div >
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button type="submit" >Create</button>
            
            </div>
            <hr>
        </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
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
                Image
              </th>
              <th>
                Create Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>

              <?php foreach ($slide_data as $key => $slide_datas): ?>
              <tr>
                <td>
                  <?php echo $slide_datas['tittle'] ?>
                </td>
                <td>
                  <?php echo $slide_datas['content'] ?>
                </td>
                <td>
                  <?php echo $slide_datas['link'] ?>
                </td>
                <td style="width: 20%">
                  <img style="width: 100%" src="<?php echo url('../storage/app/upload', ['img' => $slide_datas['img']]) ?>">
                </td>
                <td>
                  <?php echo $slide_datas['created_at'] ?>
                </td>
                <td class="text-right">
                  <a href="{{ url('admin/setting/slide/destroy', ['id' => $slide_datas['id']]) }}">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
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
@endsection
