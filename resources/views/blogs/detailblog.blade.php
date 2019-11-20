@extends('blogs.sidebar')
@section('navbar_blog')
@section('content_blog')
<?php  
use App\Comment;
$user_id = 0;
if (Auth::check()) {
	$user = Auth::user();
	$user_id = $user['id'];
}
?>
<div class="detail_blog">
	<div class="container bredcrumb">
		<p>
		Home > Women > T-Shirt > Boxy T-Shirt with Roll Sleeve Detail
		</p>
	</div>
	<div class="col-sm-12">
		<?php foreach ($post as $key => $posts): ?>
		<?php  
		$post_id = 0;
		$post_id = $posts['id'];
		?>
		<img src="<?php echo url('../storage/app/upload', ['img' => $posts['avatar']]) ?>">
		<h2><?php echo $posts['tittle'] ?></h2>
		<div class="blog-post-creater" style="margin-bottom: 15px">
			<p>by <span>Admin</span> | <span>28 Dec, 2018</span> | <span>Cooking, Food</span> | <span>8 Comments</span></p>
		</div>
		<?php echo $posts['content'] ?>
		<?php endforeach ?>
	</div>
	<div class="col-sm-12 detail_blog-categories">
		<p>tags <button><a href="">streetstyle</a></button> <button><a href="">crafts</a></button></p>
	</div>
	<div class="col-sm-12 detail_blog-comment">
		<form method="POST" id="form_comment">
		@csrf
		<h3>LEAVE A COMMENT</h3>
		<input style="display: none" type="text" name="user_id" id="user_id" value="<?php echo $user_id ?>">
		<input style="display: none" id="post_id" type="text" name="post_id" value="<?php echo $post_id ?>">
		<input style="display: none" type="text" name="comment_id" id="comment_id" value="0">
		<textarea placeholder="Comment..." name="comment" id="comment_content"></textarea>
		<p id="warning_login"></p>
		<p id="warning_content"></p>
		<p id="warning_comment"></p>
		<p id="warning_reply"></p>
		<button id="comment_submit">post comment</button>
		</form>
		<hr>
		<div id="show_comment_content">

		</div>
	</div>

</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#form_comment').submit(function(event){
      event.preventDefault();
      warning_content = 'vui long binh luan';
      warning_login = 'Vui Long <a href="<?php echo url('login') ?>">Dang Nhap</a>';
      post_id = $('#post_id').val();
      comment_content = $('#comment_content').val();
      user_id = <?php echo $user_id ?>;
      var form_data = $(this).serialize();
      if (<?php echo $user_id ?> == 0) {
        $('#warning_login').html(warning_login);
        return false;
      }
      else if (!comment_content) {
        $('#warning_content').html(warning_content);
        return false;
      };
      $.ajax ({
        url:'<?php echo url('blogs/comment') ?>',
        type:'post',
        dataType: 'json',
        data: form_data,
        success:function(data){
          $('#form_comment')[0].reset();
        }
      }).done(function(data){
        $('#warning_comment').html(data.warning);
      });
      loadComment();

    });
    loadComment();
    function loadComment()
    {
      $.ajax({
        url:'<?php echo url('/blogs/comment/show') ?>/' + <?php echo $post_id ?>,
        method:'get',
        success:function(data)
        {
          $('#show_comment_content').html(data);
        }
      });
    }
    <?php $data = Comment::where(['parent_comment_id' => 0])->where(['post_id' => $post_id])->orderByRaw('id DESC')->get(); ?>
    <?php foreach ($data as $key => $value): ?>
    $(document).on('click', '#reply<?php echo $value['id'] ?>',function(event){
      event.preventDefault();
      var comment_id = <?php echo $value['id'] ?>;
      $('#comment_id').val(comment_id);
      $('#comment_content').focus();
    });
    <?php endforeach ?>
    setInterval(function(){
      $('#show_comment_content').load('<?php echo url('/blogs/comment/show') ?>/' + <?php echo $post_id ?>).fadeIn('slow');
    }, 5000);
  });
</script>
@endsection