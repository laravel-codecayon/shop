<div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Home</a> {{$cat_link}} » <a href="{{URL::to('')}}/detail/{{$product->slug}}-{{$product->ProductID}}.html">{{$product->ProductName}}</a></div>
      <!--Breadcrumb Part End-->
      <div class="product-info">
        <div class="left">
          <div class="image"> 
            @if(count($images) > 0)
              <a href="{{URL::to('')}}/uploads/images_product/{{$images[0]->name}}" class="cloud-zoom colorbox" id='zoom1' rel="adjustX: 0, adjustY:0, tint:'#000000',tintOpacity:0.2, zoomWidth:360, position:'inside', showTitle:false"> 
                <img src="{{URL::to('')}}/uploads/images_product/thumb/{{$images[0]->name}}" title="#" alt="#" id="image" />
              </a>
            @else
              <img src="{{URL::to('')}}/sximo/images/no_pic.png" title="#" alt="#" id="image" />
            @endif
          </div>
          <div class="image-additional"> 
            @if(count($images) > 0)
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
              <input type="button" class="button" id="button-cart" onclick="addcart({{$product->ProductID}},'qty')" value="Add to Cart">
            </div>
            <!--<div><span>&nbsp;&nbsp;&nbsp;- OR -&nbsp;&nbsp;&nbsp;</span></div>
            <div><a href="#" class="wishlist">Add to Wish List</a><br>
              <a href="#" class="wishlist">Add to Compare</a></div>-->
          </div>
          <!-- AddThis Button BEGIN -->
        </div>
      </div>
      <!-- Tabs Start -->

        {{$product->Content}}

      <!-- Tabs End -->
      <!-- Related Products Start -->
      @if(count($pro_same) > 0)
      <div class="box">
        <div class="box-heading">Related Products</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($pro_same as $same)
              {{SiteHelpers::templateProduct($same)}}
            @endforeach
          </div>
        </div>
      </div>
      @endif
      <!-- Related Products End -->
    </div>




