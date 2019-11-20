<?php  
use App\Product_sale;
$sale = Product_sale::cursor();
$expiry_time = 0;
foreach ($sale as $key => $value) {
    $expiry_time = $value['time'];
}
echo $expiry_time;
?>
<html>
  <head>
  <title>My Now Amazing Webpage</title>
  <link rel="stylesheet" type="text/css" href="{{ url('slick/slick.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ url('slick/slick-theme.css') }}"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  </head>
  <style type="text/css">
  .autoplay button {
    background-color: black;
  }
  .autoplay button:hover {
    background-color: black;
  }
  .autoplay button:focus {
    display: block;
    background-color: black;
  }
  .slick-slide {
    height: auto;
  }
  </style>
  <body>
    <div countdown="" data-date="<?php echo $expiry_time ?>">
     Chỉ còn: <span data-days="">00</span> ngày 
              <span data-hours="">00</span> giờ 
              <span data-minutes="">00</span> phút 
              <span data-seconds="">00</span> giây
              <?php if ('data-seconds'): ?>
                  
              <?php endif ?>
    </div>
  </body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="{{ url('js/countdown.js') }}"></script>

</html>