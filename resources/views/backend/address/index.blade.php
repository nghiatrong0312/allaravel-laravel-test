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
        <h4 class="card-title">Address Table / <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <div id="noted-header_bar">
        <small>"Just create one Adress for The Website"</small>
        </div>
        <form id="create_categories1" enctype="multipart/form-data" method="POST" action="{{ route('address.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                  <label>Phone Number</label>
                <input placeholder="Phone Number" type="text" class="form-control" name="phone_number" id="usr">
                </div>
                <div class="col-sm-6">
                  <label>Email</label>
                <input placeholder="Email"  type="text" class="form-control" name="email" id="usr">
                </div>

                <div class="col-sm-12">
                  <label>Address</label>
                <input placeholder="Address" type="text" class="form-control" name="address" id="usr">
                </div >
                <div class="col-sm-12">
                  <label>Maps Link</label>
                <input placeholder="Maps Link" type="text" class="form-control" name="maps_link" id="usr">
                </div >
                <div class="col-sm-12">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo" id="usr">
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
                Address
              </th>
              <th>
                Logo
              </th>
              <th>
                Email
              </th>
              <th>
                Phone Number
              </th>
              <th>
                Maps
              </th>
              <th>
                Created Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>

              <?php foreach ($address_data as $key => $address_datas): ?>
              <tr>
                <td>
                  <?php echo $address_datas['address'] ?>
                </td>
                <td>
                  <img style="width: 100%" src="<?php echo url('../storage/app/upload', ['img' => $address_datas['logo']]) ?>">
                </td>
                <td>
                  <?php echo $address_datas['email'] ?>
                </td>
                <td>
                  <?php echo $address_datas['phone'] ?>
                </td>
                <td id="maps_address">
                  <?php echo $address_datas['maps'] ?>
                </td>
                <td>
                  <?php echo $address_datas['created_at'] ?>
                </td>
                <td class="text-right">
                  <a href="{{ url('admin/address/destroy', ['id' => $address_datas['id']]) }}">
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
