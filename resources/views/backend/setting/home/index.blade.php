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
        <h4 class="card-title">Home Page / <small style="font-size: 15px;"><a href="{{ url('/admin') }}">Exit</a></small></h4>
      </div>
      <div class="card-body setting_home">
      	<div class="row container">  

	      	<div class="col-md-3" style="background-image: url('../../../storage/app/upload/y.jpg');">
		      	<div id="setting_home-overlay">
		      		<a href="{{ url('admin/setting/home/categories_block') }}"><p>Categories Block</p></a>
		      	</div>
	      	</div>
	      	<div class="col-md-3" style="background-image: url('../../../storage/app/upload/b.jpg');">
		      	<div id="setting_home-overlay">
		      		<a href=""><p>Collection Block</p></a>
		      	</div>
	      	</div>
	      	<div class="col-md-3" style="background-image: url('../../../storage/app/upload/s.jpg');">
		      	<div id="setting_home-overlay">
		      		<a href="{{ url('admin/setting/productsale') }}"><p>Sale Block</p></a>
		      	</div>
	      	</div>
	      	<div class="col-md-3" style="background-image: url('../../../storage/app/upload/slide.jpg');">
		      	<div id="setting_home-overlay">
		      		<a href="{{ url('/admin/setting/slide') }}"><p>Slide Block</p></a>
		      	</div>
	      	</div>
	      	<div class="col-md-3" style="background-image: url('../../../storage/app/upload/headerblock.jpg');">
		      	<div id="setting_home-overlay">
		      		<a href="{{ url('/admin/setting/header') }}"><p>Header Bar Block</p></a>
		      	</div>
	      	</div>
      	</div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection