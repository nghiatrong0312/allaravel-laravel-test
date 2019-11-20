@extends('backend.main')
@section('sidebar.navbar')
@section('backend.content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
<div class="row">
  <div class="container">
    <div class="card">
      <div class="card-header">

        <h4 class="card-title"><img src=""></h4>
       <h4 class="card-title"> <small><a href="{{ url('/admin/product/viewall') }}">Back</a> / <a href="">Edit Product</a></small></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive viewdetail-body">
          	<button class="tablink" onclick="openContent('info', this, '#f96332')" id="defaultOpen">Information</button>
          	<button class="tablink" onclick="openContent('sold_out', this, '#f96332')" id="button_1">Comment</button>
        </div>
        <div class="tabcontent viewdetail-body-info view_blog" id="info">
        	<?php foreach ($post as $key => $posts): ?>
        	<img src="<?php echo url('../storage/app/upload', ['img' => $posts['avatar']]) ?>">
        	<div class="row">
        		<div class="col-sm-7">
        			<label>Tittle</label>
        			<input type="text" disabled="" value="<?php echo $posts['tittle'] ?>" name="">
        		</div>
        		<div class="col-sm-5">
                    <label>Creator</label>
                    <input type="text" disabled="" value="<?php echo $user_name ?>" name="">
                </div>
        	</div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Categories</label>
                    <input type="text" disabled="" value="<?php echo $categories_name ?>" name="">
                </div>
                <div class="col-sm-4">
                    <label>Quantity Comment</label>
                    <input type="text" disabled="" value="<?php echo $user_name ?>" name="">
                </div>
                <div class="col-sm-4">
                    <label>Quantity View</label>
                    <input type="text" disabled="" value="Custumer" name="">
                </div>
            </div>
        	<div class="row">
        		<div class="col-sm-12">
        			<label>Introduction Product</label>
        		<textarea disabled="" id="editor1"><?php echo $posts['content'] ?></textarea>
        		</div>
        	</div>
        	<?php endforeach ?>


        </div>
        <div class="tabcontent viewdetail-body-sold_out" id="sold_out">
            <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Name Customer 
              </th>
              <th>
                MemberShip
              </th>
              <th>
                Reply
              </th>
              <th>
            	Comment Time
              </th>
              <th class="text-right">
                
              </th>
              <th class="text-right">
                
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
            <tr>


                <td>

                </td>


                <td>
                	Gold
                </td>
                <td>
                    
                </td>
                <td>
                    12:00, 30-12-2019
                </td>
                <td class="text-right">
                    <a href=""><i class="now-ui-icons files_box"></i></a>
                </td>
                <td class="text-right">
                    <a href=""><i class="now-ui-icons files_box"></i></a>
                </td>
                <td class="text-right">
                    <a href=""><i class="now-ui-icons files_box"></i></a>
                </td>
            </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
