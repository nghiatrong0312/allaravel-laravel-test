<?php  
$style_warning = 'block';
if (Auth::check()) {
	$style_warning = 'none';
}
?>
@if ( Session::has('comment_warning') )
    <div style="display: <?php echo $style_warning ?>" id="hide" class="alert alert-success alert-dismissible warning_login" role="alert">
        {{ Session::get('comment_warning') }}
        <a href="{{ url('login') }}">Login</a>
    </div>
@endif
<p class="help is-danger" style="color: red;">{{ $errors->first('reply') }}</p>