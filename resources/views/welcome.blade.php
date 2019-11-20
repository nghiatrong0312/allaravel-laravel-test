<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Shop</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/site.css') }}">
        <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript" ></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="{{ url('slick/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('slick/slick-theme.css') }}">


    </head>
    <body>
        @section('navbar')
        @show
        <div class="row small_navbar">
          <div class="col-sm-3 small_navbar-icon">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-pinterest-p"></i></a>
            <a href=""><i class="fa fa-youtube-play"></i></a>
          </div>
          <div class="col-sm-6 small_navbar-text">
            <p>Free shipping for standard order over $100</p>
          </div>
          <div class="col-sm-3 small_navbar-address">
            <p>fashe@example.com</p>
            <?php  
            $icon_css1 = 'block';
            $icon_css2 = 'none';
            $user_id = 0;
            if (Auth::check()) {
              $user = Auth::user();
              $user_id = $user['id'];
              if ($user['permission'] == 2) {
                $icon_css1 = 'none';
                $icon_css2 = 'block';
              }
            }
            ?>
            <a style="display: <?php echo $icon_css1 ?>" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i></a>
            <a id="dropdown_customer" style="display: <?php echo $icon_css2 ?>" href="javascript:void(0)"><i class="fa fa-user-circle-o"></i></a>
            <div class="col-sm-7 dropdown_customer" id="dropdown_customer1">
            <ul>
              <li><i class="fa fa-vcard-o"></i> <a href="{{ url('profile',['id' => $user_id]) }}">View Profile</a></li>
              <li><i class="fa fa-shopping-basket"></i> <a href="">Change Password</a></li>
              <li><i class="fa fa-shopping-basket"></i> <a href="{{ url('cart/order') }}">History Order</a></li><hr>
              <li style="margin-top: 10px;"><i class="fa fa-sign-out"></i> <a href="{{ url('login/logout') }}">Logout</a></li>
            </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 navbar" style="margin-bottom: 0px;">
          <div class="col-sm-3 navbar-logo">
            <img src="{{ url('../storage/app/upload/logo.png') }}">
          </div>
          <div class="col-sm-6 navbar-menu">
            <ul class="nav1">
              <li class="active"><a href="{{ url('/') }}">home</a></li>
              <li><a onclick="myFunction()" class="dropclick" >product</a></li>
                <div class="navbar-menu-drop">
                  <ul class="dropdown-menu1" id="navbar_menu_drop-click1">
                    <li><a href="<?php echo url('categories', ['id' => 1]) ?>">dresses</a></li>
                    <li><a href="<?php echo url('categories', ['id' => 2]) ?>">glass</a></li>
                    <li><a href="<?php echo url('categories', ['id' => 3]) ?>">bags</a></li>
                    <li><a href="<?php echo url('categories', ['id' => 4]) ?>">watch</a></li>
                    <li><a href="<?php echo url('categories', ['id' => 5]) ?>">footerwear</a></li>
                  </ul>
                </div>
              <li><a href="{{ url('/testslider') }}">sale</a></li>
              <li><a href="">features</a></li>
              <li><a href="{{ url('/blogs') }}">blogs</a></li>
              <li><a href="{{ url('about') }}">about</a></li>
              <li><a href="{{ url('contact') }}">contact</a></li>
            </ul>
          </div>
          <div class="col-sm-3 navbar-icon">

            <a data-toggle="modal" data-target="#exampleModal" href="javascript:void(0)"><i class="fa fa-search"></a></i><span>|</span>
            
            <div class="modal fade search" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <form method="GET" action="{{ route('search') }}">
                    @csrf
                    <input id="content_search" type="text" value="" name="search" placeholder="Search Product">
                    <button id="search"><i class="fa fa-search"></i></button>
                    <p id="warning"></p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ url('/cart/viewdetail') }}"><i class="fa fa-shopping-bag"></i></a><small id="amount">
              <?php 
              $total_amount = 0;
              if (!empty(Session::get('cart'))) {
                foreach (Session::get('cart') as $key => $value) {
                $total_amount += $value['amount'];                  
                }
              }  
            ?>
            <?php echo $total_amount; ?>
            </small>
          </div>
        </div>
        <div class="navbar1 col-sm-12" style="position: fixed; display: none;">
          <div class="col-sm-3 navbar1-logo">
            <img src="{{ url('../storage/app/upload/logo.png') }}">
          </div>
          <div class="col-sm-6 navbar1-menu">
            <ul class="nav2">
              <li class="active"><a href="{{ url('/') }}">home</a></li>
              <li id="navbar_menu2_drop-click">product</li>
                <div class="navbar-menu-drop">
                  <ul id="navbar_menu2_drop-click1">
                    <li><a href="">dresses</a></li>
                    <li><a href="">glass</a></li>
                    <li><a href="">bags</a></li>
                    <li><a href="">watch</a></li>
                    <li><a href="">footerwear</a></li>
                  </ul>
                </div>
              <li><a href="">sale</a></li>
              <li><a href="">features</a></li>
              <li><a href="{{ url('/blogs') }}">blogs</a></li>
              <li><a href="">about</a></li>
              <li><a href="">contact</a></li>
            </ul>
          </div>
          <div class="col-sm-3 navbar1-icon">
            <i class="fa fa-search"></i><span>|</span>
            <a href="{{ url('/cart/viewdetail') }}"><i class="fa fa-shopping-bag"></i></a><small id="amount2">
              <?php 
              $total_amount = 0;
              if (!empty(Session::get('cart'))) {
                foreach (Session::get('cart') as $key => $value) {
                $total_amount += $value['amount'];                  
                }
              }  
            ?>
            <?php echo $total_amount; ?>
            </small>
          </div>
        </div>
        <div>
        @yield('content')
        </div>
        <footer>
          <div class="row footer">
              <div class="col-sm-3 footer_info">
                <h4>GET IN TOUCH</h4>
                <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                <div class="footer_info-icon">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-instagram"></i>
                  <i class="fa fa-pinterest-p"></i>
                  <i class="fa fa-youtube-play"></i>
                </div>
              </div>
              <div class="col-sm-6 footer_menu">
                <div class="col-sm-4">
                  <h4>CATEGORIES</h4>
                  <ul>
                    <li>Men</li>
                    <li>Women</li>
                    <li>Dresses</li>
                    <li>Sunglass</li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h4>LINKS</h4>
                  <ul>
                    <li>Search</li>
                    <li>about us</li>
                    <li>contact us</li>
                    <li>return </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h4>HELP</h4>
                  <ul>
                    <li>trach order</li>
                    <li>returns</li>
                    <li>shipping</li>
                    <li>FAQs</li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3 footer_newsletter">
                <h4>NEWSLETTER</h4>
                <form method="POST" action="{{ url('/feedback') }}">
                  @csrf
                <input type="" name="customer_email" placeholder="email@example.com">
                <button>Subcribe</button>
                </form>
              </div>
              <div class="container coppyright"> 
                <p>Copyright © 2017 Colorlib. All rights reserved.</p>
                </div>
              </div>
        </footer>
    </body>
    <script> 
      $(document).ready(function(){
        $("#navbar_menu2_drop-click").click(function(){
          $("#navbar_menu2_drop-click1").toggle();
        });
        $("#dropdown_customer").click(function(){
          $("#dropdown_customer1").slideToggle(300);
        });
        $(".comment_form-show_reply").click(function(){
          $(".comment_form-reply").slideToggle(300);
        });
      });
    </script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {    

    //selector đến menu cần làm việc

    var TopFixNavbar = $(".navbar");
    var TopFixNavbar1 = $(".navbar1");

  // dùng sự kiện cuộn chuột để bắt thông tin đã cuộn được chiều dài là bao nhiêu.

    $(window).scroll(function(){

    // Nếu cuộn được hơn 150px rồi

        if($(this).scrollTop()>100){

      // Tiến hành show menu ra    

        
        TopFixNavbar1.fadeIn(300);
        

        }else{

      // Ngược lại, nhỏ hơn 150px thì hide menu đi.

            TopFixNavbar.show();
            TopFixNavbar1.fadeOut();


        }}

    )

    })
    </script>
    <script>
    var slideIndex = 1;
    showSlide(slideIndex);

    function currentSlide(n) {
        showSlide(slideIndex = n);
    }
    function showSlide(n) {
       var i;
       var slide = document.getElementsByClassName('mySlide');
       var dot1 = document.getElementsByClassName('dot1');
       if (n > slide.length) {slideIndex = 1}
       if (n < 1) {slide.length = slideIndex}
       for (i = 0; i < slide.length; i++) {
           slide[i].style.display = "none";
       }
       for (i = 0; i < dot1.length; i++) {
      dot1[i].className = dot1[i].className.replace(" active", "");
      }
      slide[slideIndex-1].style.display = "block";  
      dot1[slideIndex-1].className += " active";
        }
    </script>
    <script type="text/javascript">
      $('.input-number-increment').click(function() {
        var $input = $(this).parents('.input-number-group').find('.input-number');
        var val = parseInt($input.val(), 10);
        $input.val(val + 1);
      });

      $('.input-number-decrement').click(function() {
        var $input = $(this).parents('.input-number-group').find('.input-number');
        var val = parseInt($input.val(), 10);
        $input.val(val - 1);
      })


    </script>
    <script type="text/javascript">
    function load()
    {
      alert('hihi');
    }
    function addCart(id) {
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/view'); ?>/' + id,
      });
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/view'); ?>',
        success:function(data)
        {
          $('#amount').html(data);
          $('#amount2').html(data);
        }
      });
      // var xhttp; 
      // xhttp = new XMLHttpRequest();
      // xhttp.onreadystatechange = function() {
      //   if (this.readyState == 4 && this.status == 200) {
      //     document.getElementById("txtHint").innerHTML = this.responseText;
      //   }
      // };
      // xhttp.open('get', '<?php echo url('cart/view') ?>/' + id, true);
      // xhttp.send();
      
    }
    $('#search').click(function(){
      var action = 'javascript:void(0)';
      var action1 = 'route(search)';
      var warning = 'Please Input Your Information Need Search';
      var content = $("#content_search").val();
      if (!content) {
        $("#warning").text(warning);
        return false;
      }else{
        return true;
      }
    })
  </script>
  <script>
    $(document).ready(function(){
      $('#ex1').zoom();
    });
  </script>
  <!-- change csss menu nav -->
  <script type="text/javascript">
    $(document).ready(function() {

            var CurrentUrl= document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            console.log(CurrentUrlEnd);
            $( ".nav1 li a" ).each(function() {
                  var ThisUrl = $(this).attr('href');
                  var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();

                  if(ThisUrlEnd == CurrentUrlEnd){
                  $('.nav1 li.active').removeClass('active');
                  $(this).closest('li').addClass('active')
                  }
            });

   });
  </script>
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("navbar_menu_drop-click1").classList.toggle("show");
}


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropclick')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ url('slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/countdown.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
  </script>
</html> 
  
