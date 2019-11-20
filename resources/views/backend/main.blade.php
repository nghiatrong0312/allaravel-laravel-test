<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
        Now UI Dashboard by Creative Tim
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Files -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/backendsite.css') }}">
        <link href="{{ url('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ url('/assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="url('/assets/demo/demo.css')" rel="stylesheet" />
</head>
    </head>
<body onload="myFunction()">
	<div class="wrapper">
        @section('sidebar.navbar')
        @show
        <div class="sidebar" data-color="orange">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                      <a href="{{ url('/admin') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/info') }}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Staff Information</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/categories') }}">
                        <i class="now-ui-icons design_bullet-list-67"></i>
                        <p>Categories</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/giftcode') }}">
                        <i class="now-ui-icons shopping_tag-content"></i>
                        <p>Gift Code</p>
                        </a>
                    </li>
                    <li class="product_drop_menu">
                        <a href="javascript:viod(0)">
                          <i class="now-ui-icons shopping_shop"></i>
                          <p>Products Manager</p>
                          <small>
                              <i class="now-ui-icons arrows-1_minimal-down product_down"></i>
                              <i style="display: none;" class="now-ui-icons arrows-1_minimal-up product_up"></i>
                          </small>
                        </a>
                        <ul id="menu_drop_product">
                          <a href="{{ url('/admin/product/viewall') }}"><li>View Product</li></a>
                          <a href="{{ url('/admin/statusproduct') }}"><li>Status Product</li></a>
                          <a href="{{ url('/admin/product/sold') }}"><li>Sold Product</li></a>
                        </ul>
                    </li>
                    <li>
                        <a href="./map.html">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>Customer Manager</p>
                        </a>
                    </li>
                    <li class="blogs_drop_menu">
                        <a href="javascript:viod(0)">
                          <i class="now-ui-icons shopping_shop"></i>
                          <p>Blogs Manager</p>
                          <small>
                              <i class="now-ui-icons arrows-1_minimal-down blog_down"></i>
                              <i style="display: none;" class="now-ui-icons arrows-1_minimal-up blog_up"></i>
                          </small>
                        </a>
                        <ul id="menu_drop_blogs">
                          <a href="{{ url('/admin/blogpost/create') }}"><li>Post Create</li></a>
                          <a href="{{ url('/admin/blogcategories/view') }}"><li>Blogs Categories</li></a>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="./notifications.html">
                        <i class="now-ui-icons ui-1_bell-53"></i>
                        <p>Notifications</p>
                        </a>
                    </li>
                    <li class="contact_drop_menu">
                        <a href="javascript:viod(0)">
                          <i class="now-ui-icons location_pin"></i>
                          <p>Contact</p>
                          <small>
                              <i class="now-ui-icons arrows-1_minimal-down contact_down"></i>
                              <i style="display: none;" class="now-ui-icons arrows-1_minimal-up contact_up"></i>
                          </small>
                        </a>
                        <ul id="menu_drop_contact">
                          <a href="{{ url('/admin/network') }}"><li>Social Network</li></a>
                          <a href="{{ url('/admin/address') }}"><li>Address</li></a>
                        </ul>
                    </li>
                    <li class="setting_drop_menu">
                        <a href="javascript:viod(0)">
                          <i class="now-ui-icons loader_gear"></i>
                          <p>Setting Theme</p>
                          <small>
                              <i class="now-ui-icons arrows-1_minimal-down setting_down"></i>
                              <i style="display: none;" class="now-ui-icons arrows-1_minimal-up setting_up"></i>
                          </small>
                        </a>
                        <ul id="menu_drop_setting">
                          <a href="{{ url('admin/setting/about/view/2') }}"><li>About Page</li></a>
                          <a href="{{ url('/admin/setting/home') }}"><li>Home Page</li></a>
                        </ul>
                    </li>
                    <li class="active-pro">
                        <a href="./upgrade.html">
                        <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                        <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="main-panel" id="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent bg-primary  navbar-absolute">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <form>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="now-ui-icons media-2_sound-wave"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Stats</span>
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons location_world"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
                <li class="nav-item" id="dropdown_user">
                  <a class="nav-link" href="#pablo">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Account</span>
                    </p>
                  </a>
                  <div id="dropdown_user-content" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <?php if (Auth::check()): ?>
                    <?php $block_create_account = 'block'; ?>
                    <?php  
                        $user = Auth::user();
                        if ($user['permission'] == 1) {
                          $block_create_account = 'none';
                        } elseif ($user['permission'] == 2) {
                          $block_create_account = 'none';
                        }
                    ?>
                    <a style="display: <?php echo $block_create_account ?>" class="dropdown-item" href="#">Create Account</a>
                    <?php endif ?>
                    <a class="dropdown-item" href="#">View Profile</a>
                    <a class="dropdown-item" href="#">Change Password</a>
                    <a class="dropdown-item" href="{{ url('/admin/logout') }}">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        @yield('backend.content')
        <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>    
    </div>
    <script src="{{ url('/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ url('/assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ url('/assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('/assets/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ url('/assets/demo/demo.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor/ckeditor.js') }}"></script>
    <script> 
      CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
      } );
    </script>
    <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
    </script>
    <script>
      function openContent(cityName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(cityName).style.display = "block";
        elmnt.style.backgroundColor = color;

      }
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
      

      $(".contact_drop_menu").click(function(){
        $("#menu_drop_contact").fadeToggle();
        $('.contact_down').toggle();
        $('.contact_up').toggle();
      });
      $(".setting_drop_menu").click(function(){
        $("#menu_drop_setting").fadeToggle();
        $('.setting_down').toggle();
        $('.setting_up').toggle();
      });

      $(".blogs_drop_menu").click(function(){
        $("#menu_drop_blogs").fadeToggle();
        $('.blog_down').toggle();
        $('.blog_up').toggle();
      });

      $(".product_drop_menu").click(function(){
        $("#menu_drop_product").fadeToggle();
        $('.product_down').toggle();
        $('.product_up').toggle();
      });

      $("#add_color_toggle").click(function(){
        $('#add_color_toggle1').fadeToggle(300);

      });
      $("#add_size_toggle").click(function(){
        $('#add_size_toggle1').fadeToggle(300);

      });
      $("#create_categories").click(function(){
        $('#create_categories1').fadeToggle(300);
      });
      $("#create_service").click(function(){
        $('#create_service1').fadeToggle(300);
      });
      $("#dropdown_user").click(function(){
        $('#dropdown_user-content').slideToggle(200);

      });
      $("#waiting_confimation_click").click(function(){
        $('#waiting_confimation_active').slideToggle(200);

      });
      $("#waiting_delivery_click").click(function(){
        $('#waiting_delivery_active').slideToggle(200);

      });
      $("#delivered_click").click(function(){
        $('#delivered_active').slideToggle(200);

      });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {

            var CurrentUrl= document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            console.log(CurrentUrlEnd);
            $( ".nav li a" ).each(function() {
                  var ThisUrl = $(this).attr('href');
                  var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();

                  if(ThisUrlEnd == CurrentUrlEnd){
                  $('.nav li.active').removeClass('active');
                  $(this).closest('li').addClass('active')
                  }
            });

    });
    </script>
    <script>
    function myFunction() {
      setTimeout(function(){
            $.ajax({
              url:'<?php echo url('/admin/giftcode/destroy') ?>',
              success:function(data)
            }).fadeIn('slow');
          }, 1000);
    }
    </script>
</body>
</html>