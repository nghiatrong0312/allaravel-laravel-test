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
        <h4 class="card-title">Header Bar</h4>
        <small style="font-size: 15px"><a href="{{ url('admin/setting/home') }}">Back</a> / <a id="create_categories" href="javascript:void(0)">Create</a></small>
        <div id="noted-header_bar">
        <small>"Just create one Bar for The Website"</small>
        </div>
        <form id="create_categories1" method="POST" action="{{ route('header.store') }}">
              @csrf
            <div class="col-md-6 row form-group">
                <div class="col-sm-6">
                <input placeholder="Add Background Color" type="text" class="form-control" name="header_color" id="usr">
                </div>
                <div class="col-sm-6">
                <input placeholder="Add Email"  type="text" class="form-control" name="header_email" id="usr">
                </div>

                <div class="col-sm-12">
                <input placeholder="Tittle" type="text" class="form-control" name="header_tittle" id="usr">
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
                Email
              </th>
              <th>
                Background Color
              </th>
              <th>
                Created Time
              </th>
              <th class="text-right">
                
              </th>
            </thead>
            
            <tbody>

              <?php foreach ($header_data as $key => $header_datas): ?>
              <tr>
                <td>
                  <?php echo $header_datas['tittle'] ?>
                </td>
                <td>
                  <?php echo $header_datas['email'] ?>
                </td>
                <td>
                  <?php echo $header_datas['color'] ?>
                </td>
                <td>
                  <?php echo $header_datas['created_at'] ?>
                </td>
                <td class="text-right">
                  <a href="{{ url('admin/setting/header/destroy', ['id' => $header_datas['id']]) }}">
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
