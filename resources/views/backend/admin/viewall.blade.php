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
        <h4 class="card-title">Staff Information</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class=" text-primary">
              <th>
                Staff Name
              </th>
              <th>
                Permission
              </th>
              <th>
                Active Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>
            <?php foreach ($info as $key => $infos): ?>            	
              <tr>
                <td>
                	<?php echo $infos['lastname'].' '.$infos['firstname'] ?>
                </td>
                <td>

                </td>
                <td>
                	<?php echo $infos['created_at'] ?>
                </td>
                <td class="text-right">
                  <a href="">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                  </a>
                  <a href="">
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
