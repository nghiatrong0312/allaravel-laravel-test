@extends('blogs.sidebar')
@section('navbar_blog')
@section('content_blog')
<?php foreach ($post as $key => $posts): ?>

<div class="col-sm-6 blog-post">
	<div class="blog-post-time">
		<span><?php echo $posts['time'] ?></span>
	</div>
	<div class="img-hover-zoom">
		<img src="<?php echo url('../storage/app/upload', ['img' => $posts['avatar']]) ?>">
	</div>
	<h4><a href="{{ url('/blogs', ['id' => $posts['id']]) }}" id="up<?php echo $posts['id'] ?>"><?php echo $posts['tittle'] ?></a></h4>
	<div class="blog-post-creater">
	<p>by <span>Admin</span> | <span>Cooking, Food</span> | <span>8 Comments</span></p>
	</div>
	<p><?php echo mb_substr($posts['content'], '0', '200') ?></p>
	<button>
	<a href="{{ url('/blogs', ['id' => $posts['id']]) }}" id="up1<?php echo $posts['id'] ?>">continue reading</a>
	</button>
</div>

<?php endforeach ?>

<script type="text/javascript">
	<?php foreach ($post as $key => $value): ?>
	$(document).ready(function(){
		$('#up<?php echo $value['id'] ?>').click(function(event){
			$.ajax ({
		        url:'<?php echo url('/blogs/getview') ?>/' + <?php echo $value['id'] ?>,
		        type:'get',
		        success:function(data){
		        }
	      	})			
		})
		$('#up1<?php echo $value['id'] ?>').click(function(event){
			$.ajax ({
		        url:'<?php echo url('/blogs/getview1') ?>/' + <?php echo $value['id'] ?>,
		        type:'get',
		        success:function(data){
		        }
	      	})			
		})
	});
	<?php endforeach ?>
</script>

@endsection
