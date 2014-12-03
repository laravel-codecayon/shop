<div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> {{$cat_link}} » <a href="{{URL::to('')}}/detail/{{$product->slug}}-{{$product->ProductID}}.html">{{$product->ProductName}}</a></div>
      <!--Breadcrumb Part End-->
      <div class="product-info">
        <div class="left">
          <div class="image"> 
            @if($images != "")
              <a href="{{URL::to('')}}/uploads/images_product/{{$images[0]->name}}" class="cloud-zoom colorbox" id='zoom1' rel="adjustX: 0, adjustY:0, tint:'#000000',tintOpacity:0.2, zoomWidth:360, position:'inside', showTitle:false"> 
                <img src="{{URL::to('')}}/uploads/images_product/thumb/{{$images[0]->name}}" title="#" alt="#" id="image" />
              </a>
            @else
              <img src="{{URL::to('')}}/sximo/images/no_pic.png" title="#" alt="#" id="image" />
            @endif
          </div>
          <div class="image-additional"> 
            @if($images != "")
              @foreach($images as $image)
                <a href="{{URL::to('')}}/uploads/images_product/{{$image->name}}" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '{{URL::to('')}}/uploads/images_product/thumb/{{$image->name}}' "> 
                  <img src="{{URL::to('')}}/uploads/images_product/thumb/{{$image->name}}" width="62" />
                </a> 
              @endforeach
            @endif
          </div>
        </div>
        <div class="right">
          <h1>{{$product->ProductName}}</h1>
          <div class="description"> 
            @if($cat != "")
              <span>Category:</span> <a href="{{URL::to('')}}/category/{{$cat->alias}}-{{$cat->CategoryID}}.html">{{$cat->CategoryName}}</a><br>
            @endif
            @if($product->id_promotion != 0)
              {{--*/ $promotion = SiteHelpers::getNamePromotion($product->id_promotion) /*--}}
              <span>Promotion:</span>{{$promotion->name}}<br>
            @endif
          </div>
          @if($product->id_promotion != 0)
            {{--*/ $price_promotion = $promotion->type == 1 ? $product->UnitPrice - $promotion->promotion : $product->UnitPrice  - ($product->UnitPrice  * $promotion->promotion / 100);/*--}}
            <div class="price">Price: <span class="price-old">{{number_format($product->UnitPrice,0,',','.')}} VNĐ</span>
              <div class="price-tag">{{number_format($price_promotion,0,',','.')}} VNĐ</div>
            </div>
          @else
              <div class="price">Price: 
                <div class="price-tag">{{number_format($product->UnitPrice,0,',','.')}} VNĐ</div>
              </div>
          @endif
          <div class="cart">
            <div>
              <div class="qty"> <strong>Qty:</strong> <a href="javascript:void(0);" class="qtyBtn mines">-</a>
                <input type="text" value="1" size="2" name="quantity" class="w30" id="qty">
                <a href="javascript:void(0);" class="qtyBtn plus">+</a>
                <div class="clear"></div>
              </div>
              <input type="button" class="button" id="button-cart" onclick="addcart({{$product->ProductID}})" value="Add to Cart">
            </div>
            <!--<div><span>&nbsp;&nbsp;&nbsp;- OR -&nbsp;&nbsp;&nbsp;</span></div>
            <div><a href="#" class="wishlist">Add to Wish List</a><br>
              <a href="#" class="wishlist">Add to Compare</a></div>-->
          </div>
          <script>
            function addcart(id){
                var quality = $("#qty").val();
                var link = "{{ URL::to('home/addtocart?id=') }}"+id+"&quality="+quality;
                $.get(link,function(data,status){
                  
                    alert(data);
                  
                });
            }
          </script>
          <div class="review">
            <div><img alt="0 reviews" src="../sximo/themes/shop/image/stars-3.png">&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">0 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a></div>
          </div>
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
          <script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-506f325f57fbfc95"></script>
          <!-- AddThis Button END -->
          <div class="tags"> <b>Tags:</b> <a href="#">Apple</a>, <a href="#">Mobile</a>, <a href="#">Latest</a> </div>
        </div>
      </div>
      <!-- Tabs Start -->
      <div id="tabs" class="htabs"> <a href="#tab-description">Description</a> <a href="#tab-review">Reviews</a> </div>
      <div id="tab-description" class="tab-content">
        <p>iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name or number in your address book, a favorites list, or a call log. It also automatically syncs all your contacts from a PC, Mac, or Internet service. And it lets you select and listen to voicemail messages in whatever order you want just like email.</p>
        <h3>Features:</h3>
        <p>Unrivaled display performance</p>
        <ul>
          <li> 30-inch (viewable) active-matrix liquid crystal display provides breathtaking image quality and vivid, richly saturated color.</li>
          <li> Support for 2560-by-1600 pixel resolution for display of high definition still and video imagery.</li>
          <li> Wide-format design for simultaneous display of two full pages of text and graphics.</li>
          <li> Industry standard DVI connector for direct attachment to Mac- and Windows-based desktops and notebooks</li>
          <li> Incredibly wide (170 degree) horizontal and vertical viewing angle for maximum visibility and color performance.</li>
          <li> Lightning-fast pixel response for full-motion digital video playback.</li>
          <li> Support for 16.7 million saturated colors, for use in all graphics-intensive applications.</li>
        </ul>
      </div>
      <div class="tab-content" id="tab-review">
        <div class="review-list">
          <div class="author"><b>Harnish</b> on  13/02/2013</div>
          <div class="rating"><img alt="1 reviews" src="image/stars-3.png"></div>
          <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</div>
        </div>
        <h2 id="review-title">Write a review</h2>
        <br>
        <b>Your Name:</b><br>
        <input type="text" value="" name="name">
        <br>
        <br>
        <b>Your Review:</b>
        <textarea style="width: 98%;" rows="8" cols="40" name="text"></textarea>
        <span style="font-size: 11px;"><span style="color: #FF0000;">Note:</span> HTML is not translated!</span><br>
        <br>
        <b>Rating:</b>&nbsp;
        <input type="radio" value="1" name="rating">
        &nbsp;
        <input type="radio" value="2" name="rating">
        &nbsp;
        <input type="radio" value="3" name="rating">
        &nbsp;
        <input type="radio" value="4" name="rating">
        &nbsp;
        <input type="radio" value="5" name="rating">
        <br>
        <br>
        <div class="buttons">
          <div class="right"><a class="button" id="button-review">Continue</a></div>
        </div>
      </div>
      <!-- Tabs End -->
      <!-- Related Products Start -->
      <div class="box">
        <div class="box-heading">Related Products (4)</div>
        <div class="box-content">
          <div class="box-product">
            <div>
              <div class="image"><a href="product.html"><img alt="iPad Classic" src="image/product/ipod_classic_1-152x152.jpg"></a></div>
              <div class="name"><a href="product.html">iPad Classic</a></div>
              <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> </div>
              <a class="button">Add to Cart</a></div>
            <div>
              <div class="image"><a href="product.html"><img alt="Sports Watch Band" src="image/product/samsung_syncmaster_941bw-152x152.jpg"></a></div>
              <div class="name"><a href="product.html">Sports Watch Band</a></div>
              <div class="price"><span class="price-new">$95.00</span></div>
              <a class="button">Add to Cart</a></div>
            <div>
              <div class="image"><a href="product.html"><img alt="iPhone" src="image/product/iphone_1-152x152.jpg"></a></div>
              <div class="name"><a href="product.html">iPhone</a></div>
              <div class="price"> <span class="price-old">$109.50</span> <span class="price-new">$101.50</span> </div>
              <a class="button">Add to Cart</a></div>
            <div>
              <div class="image"><a href="product.html"><img alt="Casual Saddle Shoes" src="image/product/hp_1-152x152.jpg"></a></div>
              <div class="name"><a href="product.html">Casual Saddle Shoes</a></div>
              <div class="price"><span class="price-new">$95.00</span></div>
              <a class="button">Add to Cart</a></div>
          </div>
        </div>
      </div>
      <!-- Related Products End -->
    </div>