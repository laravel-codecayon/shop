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
                    <td class="name"><a href="{{$item->link}}">{{$item['ProductName']}}</a></td>
                    <td class="model">{{$item['CategoryName']}}</td>
                    <td class="quantity">{{$item['sl']}}</td>
                    <td class="price">{{$item['price']}} {{$item['price_promition']}}</td>
                    <td class="total">{{$item['price_total']}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td class="price" colspan="4"><b>Sub-Total:</b></td>
                  <td class="total">£51.11</td>
                </tr>
                <tr>
                  <td class="price" colspan="4"><b>Flat Shipping Rate:</b></td>
                  <td class="total">£3.19</td>
                </tr>
                <tr>
                  <td class="price" colspan="4"><b>Total:</b></td>
                  <td class="total">£66.37</td>
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