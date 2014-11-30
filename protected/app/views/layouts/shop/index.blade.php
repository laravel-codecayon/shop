<!DOCTYPE html>
<html>

<!-- Mirrored from demo.harnishdesign.net/html/bigshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Oct 2014 16:00:27 GMT -->
<head>
<meta charset="UTF-8" />
<title>Bigshop HTML Template</title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
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
{{ HTML::script('sximo/themes/shop/jsjquery.dcjqaccordion.js') }} 

<!-- JS Part End-->
</head>
<body>
<div class="main-wrapper">
  <!-- Header Parts Start-->
  <div id="header">
    <!-- Top Right part Links-->
    <div id="welcome">
      <div id="language">Language
        <ul>
          <li><a title="English"><img src="{{ asset('sximo/themes/shop/image/flags/gb.png')}}" alt="English" />English</a></li>
        </ul>
      </div>
       </div>
    <div id="logo"><a href="{{URL::to('')}}"><img src="{{ asset('sximo/themes/shop/image/logo.png')}}" title="ecommerce Html Template" alt="ecommerce Html Template" /></a></div>
    <div id="search">
      <div class="button-search"></div>
      <input type="text" value="" placeholder="" id="filter_name" name="search">
    </div>
    <!--Mini Cart Start-->
    <div id="cart">
      <div class="heading">
        <h4><img width="32" height="32" alt="small-cart-icon" src="{{ asset('sximo/themes/shop/image/cart-bg.png')}}"></h4>
        <a><span id="cart-total">0 item(s) - $0.00</span></a></div>
      <div class="content">
        <div class="mini-cart-info">
          <table>
            <tbody>
              <tr>
                <td class="image"><a href="product.html"><img title="Chair Swing" alt="Chair Swing" width="43" height="43" src="{{ asset('sximo/themes/shop/image/product/samsung_tab_1-60x60.jpg')}}"></a></td>
                <td class="name"><a href="product.html">Chair Swing</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$236.99</td>
                <td class="remove"><img title="Remove" alt="Remove" src="{{ asset('sximo/themes/shop/image/remove-small.png')}}"></td>
              </tr>
              <tr>
                <td class="image"><a href="product.html"><img title="Eyewear Eyeglasses" alt="Eyewear Eyeglasses" width="43" height="43" src="image/product/apple_cinema_30-60x60.jpg"></a></td>
                <td class="name"><a href="product.html">Eyewear Eyeglasses</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$119.50</td>
                <td class="remove"><img title="Remove" alt="Remove" src="image/remove-small.png"></td>
              </tr>
              <tr>
                <td class="image"><a href="product.html"><img title="Nail Polish" alt="Nail Polish" width="43" height="43" src="image/product/hp_1-60x60.jpg"></a></td>
                <td class="name"><a href="product.html">Nail Polish</a></td>
                <td class="quantity">x&nbsp;1</td>
                <td class="total">$119.50</td>
                <td class="remove"><img title="Remove" alt="Remove" src="image/remove-small.png"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mini-cart-total">
          <table>
            <tbody>
              <tr>
                <td class="right"><b>Sub-Total:</b></td>
                <td class="right">$399.99</td>
              </tr>
              <tr>
                <td class="right"><b>Eco Tax (-2.00):</b></td>
                <td class="right">$6.00</td>
              </tr>
              <tr>
                <td class="right"><b>VAT (17.5%):</b></td>
                <td class="right">$70.00</td>
              </tr>
              <tr>
                <td class="right"><b>Total:</b></td>
                <td class="right">$475.99</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="checkout"><a href="cart.html" class="button">View Cart</a> &nbsp; <a href="checkout.html" class="button">Checkout</a></div>
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
      <div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">
            <div>
              <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-60x60.jpg" alt="Chair Swing" /></a></div>
              <div class="name"><a href="product.html">Chair Swing</a></div>
              <div class="price"> $236.99 </div>
              <div class="rating"><img src="image/stars-3.png" alt="Based on 1 reviews." /></div>
            </div>
            <div>
              <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-60x60.jpg" alt="iPad Classic" /></a></div>
              <div class="name"><a href="product.html">iPad Classic</a></div>
              <div class="price"> $119.50 </div>
              <div class="rating"><img src="image/stars-0.png" alt="Based on 0 reviews." /></div>
            </div>
            <div>
              <div class="image"><a href="product.html"><img src="image/product/hp_1-60x60.jpg" alt="Casual Saddle Shoes" /></a></div>
              <div class="name"><a href="product.html">Casual Saddle Shoes</a></div>
              <div class="price"> $119.50 </div>
              <div class="rating"><img src="image/stars-3.png" alt="Based on 3 reviews." /></div>
            </div>
            <div>
              <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-60x60.jpg" alt="Silver Cuff Bracelet" /></a></div>
              <div class="name"><a href="product.html">Silver Cuff Bracelet</a></div>
              <div class="price"> $1,177.00 </div>
              <div class="rating"><img src="image/stars-0.png" alt="Based on 0 reviews." /></div>
            </div>
            <div>
              <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-60x60.jpg" alt="MacBook Pro" /></a></div>
              <div class="name"><a href="product.html">MacBook Pro</a></div>
              <div class="price"> $2,000.00 </div>
              <div class="rating"><img src="image/stars-5.png" alt="Based on 5 reviews." /></div>
            </div>
          </div>
        </div>
      </div>
      <!--Latest Product End-->
      <!--Specials Product Start-->
      <div class="box">
        <div class="box-heading">Specials</div>
        <div class="box-content">
          <div class="box-product">
            <div>
              <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-60x60.jpg" alt="Apple Tablet Retina" /></a></div>
              <div class="name"><a href="product.html">Apple Tablet Retina</a></div>
              <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </div>
              <div class="rating"><img src="image/stars-0.png" alt="Based on 0 reviews." /></div>
              <div class="cart">
                <input type="button" value="Add to Cart" onClick="addToCart('42');" class="button" />
              </div>
            </div>
            <div>
              <div class="image"><a href="product.html"><img src="image/product/canon_eos_5d_1-60x60.jpg" alt="Canon Digital Camera" /></a></div>
              <div class="name"><a href="product.html">Canon Digital Camera</a></div>
              <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> </div>
              <div class="rating"><img src="image/stars-0.png" alt="Based on 0 reviews." /></div>
              <div class="cart">
                <input type="button" value="Add to Cart" onClick="addToCart('30');" class="button" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Specials Product End-->
    </div>
    <!--Left End-->
    <!--Middle Part Start-->
    <div id="content">
      <!--Slideshow Part Start-->
      @include('layouts/shop/slideshow')
      <!--Slideshow Part End-->
      <!--Featured Product Part Start-->
      {{$content}}
      <!--Featured Product Part End-->
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    <div class="social-part">
      <!--Facebook Fun Box Start-->
      <div id="facebook" >
      <div class="facebook-inner">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "../../../connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="http://www.facebook.com/160281810726316" data-width="585" data-show-faces="true" data-stream="false" data-header="false" data-border-color="#fff"></div>
      </div></div>
      <!--Facebook Fun Box End-->
      <!--Twitter Feeds Box Start-->
      <div id="twitter_footer">
<a class="twitter-timeline" href="https://twitter.com/harnishdesign" data-chrome="noheader nofooter noborders noscrollbar transparent" data-theme="light" data-tweet-limit="2" data-related="twitterapi,twitter" data-aria-polite="assertive" data-widget-id="347621595801608192">Tweets by @harnishdesign</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
      <!--Twitter Feeds Box End-->
    </div>
  </div>
</div>
<!--Footer Part Start-->
<div id="footer">
  <div class="column">
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
  </div>
  <div class="contact">
    <ul>
      <li class="address">Second plaza, Delhi, india.</li>
      <li class="mobile">191 191 91 19</li>
      <li class="email"><a href="mailto:info@demo.com">info@demo.com</a></li>
      <li class="fax">191 191 91 19</li>
    </ul>
  </div>
  <div class="social"> <a href="http://facebook.com/160281810726316" target="_blank"><img src="image/facebook.png" alt="Facebook" title="Facebook"></a> <a href="https://twitter.com/#!/#" target="_blank"><img src="image/twitter.png" alt="Twitter" title="Twitter"></a> <a href="https://plus.google.com/u/0/#" target="_blank"><img src="image/googleplus.png" alt="Google+" title="Google+"></a> <a href="http://pinterest.com/#" target="_blank"><img src="image/pinterest.png" alt="Pinterest" title="Pinterest"></a> <a href="#" target="_blank"><img src="image/rss.png" alt="RSS" title="RSS"></a> <a href="http://www.vimeo.com/#" target="_blank"><img src="image/vimeo.png" alt="Vimeo" title="Vimeo"></a> <a href="http://www.flickr.com/photos/#" target="_blank"><img src="image/flickr.png" alt="flickr" title="Flickr"></a> <a href="http://www.youtube.com/#" target="_blank"><img src="image/youtube.png" alt="YouTube" title="YouTube"></a> <a href="skype:#?call" target="_blank"><img src="image/skype.png" alt="skype" title="Skype"></a> <a href="#" target="_blank"><img src="image/blogger.png" alt="Blogger" title="Blogger"></a> </div>
  <div class="clear"></div>
  <div id="powered">Bigshop <a href="#">Html Template </a> &copy; 2013 &nbsp;|&nbsp; Template By <a target="_blank" href="http://harnishdesign.net/">Harnish Design</a>
    <div class="payments_types"> <img src="image/payment_paypal.png" alt="paypal" title="PayPal"> <img src="image/payment_american.png" alt="american-express" title="American Express"> <img src="image/payment_2checkout.png" alt="2checkout" title="2checkout"> <img src="image/payment_maestro.png" alt="maestro" title="Maestro"> <img src="image/payment_discover.png" alt="discover" title="Discover"> <img src="image/payment_mastercard.png" alt="mastercard" title="MasterCard"> <img src="image/payment_visa.png" alt="visa" title="Visa"> <img src="image/payment_sagepay.png" alt="sagepay" title="sagepay"> <img src="image/payment_moneybookers.png" alt="moneybookers" title="Moneybookers"> </div>
  </div>
</div>
<!--Footer Part End-->
</body>

<!-- Mirrored from demo.harnishdesign.net/html/bigshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Oct 2014 16:01:19 GMT -->
</html>