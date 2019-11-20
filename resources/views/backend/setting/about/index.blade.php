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
        <h4 class="card-title">About Page / <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <div id="noted-header_bar">
        <small>"Just create one Thing for About Page"</small><br>
    	
    	@if ( Session::has('note_about') )
    		<small style="color: red">"{{ Session::get('note_about') }}"</small>   
        @endif
        </div>
        <form id="create_categories1" method="POST" enctype="multipart/form-data" action="{{ route('about.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-12" id="about_intro">
	                <label>Introduction Content</label>
	                <textarea placeholder="Enter Introduction" name="about_content"></textarea>
	                <p class="help is-danger">{{ $errors->first('about_content') }}</p>
                </div >
                <div class="col-sm-12">
                	<label>Link Video</label>
                	<input placeholder="Add Link Media" type="text" class="form-control" name="about_media" id="usr">
                	<p class="help is-danger">{{ $errors->first('about_media') }}</p>
                </div>
                <div class="col-sm-12">
                	<label>Banner Background</label>
                	<input placeholder="Add Link Media" type="file" class="form-control" name="about_banner" id="usr">
                	<p class="help is-danger">{{ $errors->first('about_banner') }}</p>
                </div>
                <div class="col-sm-12">
                	<label>Achievement Background</label>
                	<input placeholder="Add Link Media" type="file" class="form-control" name="about_background" id="usr">
                	<p class="help is-danger">{{ $errors->first('about_background') }}</p>
                </div>
            </div>
            <div class="categories_page-create_submit" style="width: 70%">
            <button type="submit" >Create</button>
            
            </div>
            
        </form>
      </div>
       <hr>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Introduction
              </th>
              <th>
                Media Link
              </th>
              <th>
                Banner Background 
              </th>
              <th>
              	Achievement Background
              </th>
              <th>
                Created Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>

            <?php foreach ($about_data as $key => $about_datas): ?>

              <tr>
                <td>
                	<?php echo $about_datas['introduction'] ?>
                </td>
                <td>
                	<?php echo $about_datas['media'] ?>
                </td>
                <td>
                	<img src="<?php echo url('../storage/app/upload', ['img' => $about_datas['banner']]) ?>">
                </td>
                <td>
                	<img src="<?php echo url('../storage/app/upload', ['img' => $about_datas['background']]) ?>">
                </td>
                 <td>
                	<?php echo $about_datas['created_at'] ?>
                </td>
                <td class="text-right">
                	<a href="{{ url('admin/setting/about/view', ['id' => $about_datas['id']]) }}">
						<i class="now-ui-icons ui-1_settings-gear-63"></i>
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