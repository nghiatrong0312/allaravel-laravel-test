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
        <h4 class="card-title">Social Network / <small><a id="create_categories" href="javascript:void(0)">Create</a></small></h4>
        <form id="create_categories1" method="POST" action="{{ route('network.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                <input placeholder="Name Social Network" type="text" class="form-control" name="social_network_name" id="usr">
                </div>
                <div class="col-sm-6">
                <input placeholder="Add Link"  type="text" class="form-control" name="social_network_link" id="usr">
                </div>

                <div class="col-sm-12">
                <input placeholder="Social Network Icon" type="text" class="form-control" name="social_network_icon" id="usr">
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
                Social Network
              </th>
              <th>
                Icon
              </th>
              <th>
                Link
              </th>
              <th>
                Created Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
              <?php foreach ($network_data as $key => $network_datas): ?>
              <tr>
                <td>
                  <?php echo $network_datas['name_social'] ?>
                </td>
                <td>
                  <?php echo $network_datas['icon'] ?>
                </td>
                <td>
                  <?php echo $network_datas['link'] ?>
                </td>
                <td>
                  <?php echo $network_datas['created_at'] ?>
                </td>
                <td class="text-right">
                  <a href="{{ url('admin/network/delete', ['id' => $network_datas['id']]) }}">
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
