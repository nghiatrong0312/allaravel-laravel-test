@extends('welcome')
@section('navbar')
@section('content')
@section('navbar_blog')
@show
<?php  
use App\Blog_Categories;
$categories = Blog_Categories::cursor();
?>
<div class="row">
	<div class="col-sm-12 tittle" style="position: absolute;">
	<h1>Blog</h1>
	</div>
	<img style="width: 100%;" src="{{ url('../storage/app/upload/picture_product1.jpg') }}">
	<div class="container blog">
		<div class="col-sm-12">
			<div class="col-sm-9">
				@yield('content_blog')
			</div>
			<div class="col-sm-3">
				<div class="col-sm-12 blog_search">
					<button><i class="fa fa-search"></i></button>
					<input type="text" placeholder="Search" name="">
					
				</div>
				<div class="col-sm-12 blog_categories">
					<h4>Categories</h4>
					<ul class="sidebar_blog">
						<li class="active"><a href="{{ url('/blogs') }}">All</a></li>
						<?php foreach ($categories as $key => $value): ?>
						<li><a href="{{ url('blogs/categories', ['id' => $value['id']]) }}"><?php echo $value['categories'] ?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="col-sm-12 blog_featured_product">
					<h4>Featured Products</h4>
					<div class="col-sm-12 blog_featured_product-item" style="padding: 0px;">
						<div class="col-sm-6" style="padding-left: 0px; padding-right: 5px;">
							<img src="{{ url('../storage/app/upload/item1.jpg') }}">
						</div>
						<div class="col-sm-6">
							<a href="">White Shirt With Pleat Detail Back</a>
							<span>300.000 <small>VND</small></span>
						</div>
					</div>
					<div class="col-sm-12 blog_featured_product-item" style="padding: 0px;">
						<div class="col-sm-6" style="padding-left: 0px; padding-right: 5px;">
							<img src="{{ url('../storage/app/upload/picture1.jpg') }}">
						</div>
						<div class="col-sm-6">
							<a href="">White Shirt With Pleat Detail Back</a>
							<span>300.000 <small>VND</small></span>
						</div>
					</div>
					<div class="col-sm-12 blog_featured_product-item" style="padding: 0px;">
						<div class="col-sm-6" style="padding-left: 0px; padding-right: 5px;">
							<img src="{{ url('../storage/app/upload/item2.jpg') }}">
						</div>
						<div class="col-sm-6">
							<a href="">White Shirt With Pleat Detail Back</a>
							<span>300.000 <small>VND</small></span>
						</div>
					</div>
				</div>
				<div class="col-sm-12 blog_archive">
					<h4>Archive</h4>
					<ul>
						<li><a href="">July 2018</a> <span>(10)</span></li>
						<li><a href="">July 2018</a> <span>(10)</span></li>
						<li><a href="">July 2018</a> <span>(10)</span></li>
						<li><a href="">July 2018</a> <span>(10)</span></li>
						<li><a href="">July 2018</a> <span>(10)</span></li>
						<li><a href="">July 2018</a> <span>(10)</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

            var CurrentUrl= document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            console.log(CurrentUrlEnd);
            $( ".sidebar_blog li a" ).each(function() {
                  var ThisUrl = $(this).attr('href');
                  var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();

                  if(ThisUrlEnd == CurrentUrlEnd){
                  $('.sidebar_blog li.active').removeClass('active');
                  $(this).closest('li').addClass('active')
                  }
            });

   });

</script>
@endsection
