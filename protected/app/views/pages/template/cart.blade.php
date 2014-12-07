<div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Shopping Cart</a></div>
      <!--Breadcrumb Part End-->
      <h1>Shopping Cart</h1>
      <form enctype="multipart/form-data" method="post" action="#">
        <div class="cart-info">
          <table>
            <thead>
              <tr>
                <td class="image">Image</td>
                <td class="name">Product Name</td>
                <td class="model">Model</td>
                <td class="quantity">Quantity</td>
                <td class="price">Unit Price</td>
                <td class="total">Total</td>
              </tr>
            </thead>
            <tbody>
              @foreach($cart as $key=>$item)
                <tr>
                  <td class="image"><a href="{{$item['link']}}"><img title="{{$item['ProductName']}}" alt="{{$item['ProductName']}}" src="{{$item['image']}}"></a></td>
                  <td class="name"><a href="{{$item['link']}}">{{$item['ProductName']}}</a></td>
                  <td class="model">{{$item['categoryname']}}</td>
                  <td class="quantity"><input type="text" size="1" id="sl_{{$key}}" value="{{$item['sl']}}" name="" class="w30">
                    &nbsp;
                    <a href="javascript:" onclick="update_cart({{$key}})">
                    <img  type="image" title="Update" alt="Update" src="{{ asset('sximo/themes/shop/image/update.png')}}" />
                    </a>
                    &nbsp;<a href="javascript:" onclick="remove_cart({{$key}})"><img title="Remove" alt="Remove" src="{{ asset('sximo/themes/shop/image/remove.png')}}"></a></td>
                  <td class="price"> {{$item['price']}} {{$item['price_promition']}}</td>
                  <td class="total">{{$item['price_total']}}</td>
                </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
      </form>
      
      <div class="cart-total">
        <table id="total">
          <tbody>
          
            <tr>
              <td class="right"><b>Total:</b></td>
              <td class="right">{{$total_real}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="buttons">
        <div class="right"><a class="button" href="{{URL::to('')}}/checkout.html">Checkout</a></div>
        <div class="center"><a class="button" href="{{URL::to('')}}">Continue Shopping</a></div>
      </div>
    </div>
    <!--Middle Part End-->
    <div class="clear"></div>
    