    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Shopping Cart</a></div>
      <!--Breadcrumb Part End-->
      <h1>Checkout</h1>
      <div class="checkout">
        <div class="checkout-heading">Step 1: Checkout Options</div>
        <div class="checkout-content" style="display: block;">
          <div class="left">
            <h2>New Customer</h2>
            <p>Checkout Options:</p>
            <label for="register">
              <input type="radio" checked="checked" id="register" value="register" name="account">
              <b>Register Account</b></label>
            <br>
            <label for="guest">
              <input type="radio" id="guest" value="guest" name="account">
              <b>Guest Checkout</b></label>
            <br>
            <br>
            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
            <input type="button" class="button" id="button-account" value="Continue">
            <br>
            <br>
          </div>
          <div class="right" id="login">
            <h2>Returning Customer</h2>
            <p>I am a returning customer</p>
            <b>E-Mail:</b><br>
            <input type="text" value="" name="email">
            <br>
            <br>
            <b>Password:</b><br>
            <input type="password" value="" name="password">
            <br>
            <a href="#">Forgotten Password</a><br>
            <br>
            <input type="button" class="button" id="button-login" value="Login">
            <br>
            <br>
          </div>
        </div>
      </div>
      <div class="checkout">
        <div class="checkout-heading">Step 6: Confirm Order</div>
        <div class="checkout-content">
          <div class="checkout-product">
            <table>
              <thead>
                <tr>
                  <td class="name">Product Name</td>
                  <td class="model">Model</td>
                  <td class="quantity">Quantity</td>
                  <td class="price">Price</td>
                  <td class="total">Total</td>
                </tr>
              </thead>
              <tbody>
                @foreach($cart as $item)
                  <tr>
                    <td class="name"><a href="{{$item['link']}}">{{$item['ProductName']}}</a></td>
                    <td class="model">{{$item['categoryname']}}</td>
                    <td class="quantity">{{$item['sl']}}</td>
                    <td class="price">{{$item['price']}} {{$item['price_promition']}}</td>
                    <td class="total">{{$item['price_total']}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td class="price" colspan="4"><b>Total:</b></td>
                  <td class="total">{{$total_real}}</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="buttons">
            <div class="right">
              <input type="button" class="button" id="button-confirm" value="Confirm Order">
            </div>
          </div>
        </div>
      </div>
    </div>