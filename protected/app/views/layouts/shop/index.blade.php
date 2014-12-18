<!DOCTYPE html>
<html>

<!-- Mirrored from demo.harnishdesign.net/html/bigshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Oct 2014 16:00:27 GMT -->
<head>
<meta charset="UTF-8" />
<title><?php echo isset($page['pageTitle']) ? $page['pageTitle'].' | '.$page['pageNote'] : CNF_APPNAME ;?></title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="{{ CNF_METAKEY }}">
<meta name="description" content="{{ CNF_METADESC }}">
<link rel="shortcut icon" href="{{ URL::to('')}}/logo.ico" type="image/x-icon"> 
<meta name="author" content="">
<!-- CSS Part Start-->
{{ HTML::style('sximo/themes/shop/css/stylesheet.css')}}
{{ HTML::style('sximo/themes/shop/css/slideshow.css') }}    
{{ HTML::style('sximo/themes/shop/css/colorbox.css') }} 
{{ HTML::style('sximo/themes/shop/css/carousel.css')}}  
<!-- CSS Part End-->
<!-- JS Part Start-->
{{ HTML::script('sximo/themes/shop/js/jquery-1.7.1.min.js') }}   
{{ HTML::script('sximo/themes/shop/js/jquery.nivo.slider.pack.js') }}  
{{ HTML::script('sximo/themes/shop/js/jquery.jcarousel.min.js') }}  
{{ HTML::script('sximo/themes/shop/js/colorbox/jquery.colorbox-min.js') }}  
{{ HTML::script('sximo/themes/shop/js/tabs.js') }}  
{{ HTML::script('sximo/themes/shop/js/jquery.easing-1.3.min.js') }}  
{{ HTML::script('sximo/themes/shop/js/cloud_zoom.js') }}  
{{ HTML::script('sximo/themes/shop/js/custom.js') }}
{{ HTML::script('sximo/themes/shop/js/jquery.dcjqaccordion.js') }} 

<!-- JS Part End-->
</head>
<body>
<div class="main-wrapper">
  <!-- Header Parts Start-->
  <div id="header">
    <!-- Top Right part Links-->
    <!--<div id="welcome">
      <div id="language">Language
        <ul>
          <li><a title="English"><img src="{{ asset('sximo/themes/shop/image/flags/gb.png')}}" alt="English" />English</a></li>
        </ul>
      </div>
       </div>-->
    <div id="logo"><a href="{{URL::to('')}}"><img src="{{ asset('sximo/themes/shop/image/logo.png')}}" title="ecommerce Html Template" alt="ecommerce Html Template" /></a></div>
    <div id="search">
      <div class="button-search"></div>
      <form action="<?php echo URL::to(''); ?>/search.html" method="get">
        <input type="text" value="" placeholder="" id="filter_name" name="search">
      </form>
    </div>
    <!--Mini Cart Start-->
    <div id="cart">
      <div class="heading">
        <h4><img width="32" height="32" alt="small-cart-icon" src="{{ asset('sximo/themes/shop/image/cart-bg.png')}}"></h4>
        {{--*/ $cart = SiteHelpers::getCart() /*--}}
        <a><span id="cart-total" onclick='loadcart()'>{{$cart}}</span></a></div>
      <div class="content">
        <div class="mini-cart-info">

        </div>
        <div class="checkout"><a href="{{URL::to('')}}/cart.html" class="button">View Cart</a> &nbsp; <a href="checkout.html" class="button">Checkout</a></div>
      </div>
    </div>
    <!--Mini Cart End-->
  </div>
  <!--Top Navigation Start-->
  @include('layouts/shop/topbar')
  <!--Top Navigation Start-->
  <div id="container">
    <!--Left Part-->
    <div id="column-left">
      <!--Categories Part Start-->
      @include('layouts/shop/categories')
      <!--Categories Part End-->
      <!--Latest Product Start-->
      @include('layouts/shop/random')
      <!--Latest Product End-->
      <!--Specials Product Start-->
      @include('layouts/shop/sale')
      <!--Specials Product End-->
    </div>
    <!--Left End-->
    <!--Middle Part Start-->
    <div id="content">
      @if(Session::has('message'))
         {{ Session::get('message') }}
    @endif
      <!--Featured Product Part Start-->
      {{$content}}
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
  </div>
</div>
<!--Footer Part Start-->
<div id="footer">
  <!--<div class="column">
    <h3>Information</h3>
    <ul>
      <li><a href="about-us.html">About Us</a></li>
      <li><a href="about-us.html">Delivery Information</a></li>
      <li><a href="about-us.html">Privacy Policy</a></li>
      <li><a href="elements.html">Elements</a></li>
    </ul>
  </div>
  <div class="column">
    <h3>Customer Service</h3>
    <ul>
      <li><a href="contact-us.html">Contact Us</a></li>
      <li><a href="#">Returns</a></li>
      <li><a href="sitemap.html">Site Map</a></li>
    </ul>
  </div>
  <div class="column">
    <h3>Extras</h3>
    <ul>
      <li><a href="#">Brands</a></li>
      <li><a href="#">Gift Vouchers</a></li>
      <li><a href="#">Affiliates</a></li>
      <li><a href="#">Specials</a></li>
    </ul>
  </div>
  <div class="column">
    <h3>My Account</h3>
    <ul>
      <li><a href="#">My Account</a></li>
      <li><a href="#">Order History</a></li>
      <li><a href="#">Wish List</a></li>
      <li><a href="#">Newsletter</a></li>
    </ul>
  </div>-->
  <div class="contact">
    <ul>
      <li class="address">{{CNF_ADDRESS}}</li>
      <li class="mobile">{{CNF_PHONE}}</li>
      <li class="email"><a href="mailto:{{CNF_EMAIL}}">{{CNF_EMAIL}}</a></li>
    </ul>
  </div>
  
  <div class="clear"></div>
  <div id="powered">Bigshop <a href="#">Html Template </a> &copy; 2013 &nbsp;
    
  </div>
</div>
<script>
  function addcart(id,qty){
    if(qty == "qty"){
      var quality = $("#qty").val();
    }else{
      var quality = qty;
    }
    var link = "{{ URL::to('home/addtocart?id=') }}"+id+"&quality="+quality;
    $.get(link,function(data,status){
          $("#cart-total").html(data);
    });
  }
  function loadcart(){
    var link = "{{ URL::to('home/loadcart') }}";
    $(".mini-cart-info").html('');
    $(".checkout").hide();
    $.get(link,function(data,status){
      if(data != ''){
        $(".mini-cart-info").html(data);
        $(".checkout").show();
      }else{
        $(".mini-cart-info").html('Không có gì trong giỏ hàng !');
      }
        
    });
  }
  function remove_cart_mini(id){
    var link = "{{ URL::to('home/removecart?id=') }}"+id;
    $.get(link,function(data,status){
          $("#cart_"+id).hide();
          $("#cart-total").html(data);
    });
  }
  function remove_cart(id){
    var link = "{{ URL::to('home/removecart?id=') }}"+id;
    $.get(link,function(data,status){
          window.location.href = "{{URL::to('cart.html')}}";
    });
  }
  function update_cart(id){
    var qua = $("#sl_"+id).val();
    var link = "{{ URL::to('home/updatecart?id=') }}"+id+"&quality="+qua;
    $.get(link,function(data,status){
      window.location.href = "{{URL::to('cart.html')}}";
    });
    return false;
  }
</script>
<!--Footer Part End-->
</body>

<!-- Mirrored from demo.harnishdesign.net/html/bigshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Oct 2014 16:01:19 GMT -->
</html>