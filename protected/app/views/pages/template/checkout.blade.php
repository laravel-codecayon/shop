{{ HTML::script('sximo/themes/shop/js/jquery.jcombo.min.js') }}
{{ HTML::script('sximo/themes/shop/js/jquery.validate.js') }}
@if(Session::has('message_checkout'))
         {{ Session::get('message_checkout') }}
    @endif
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Trang chủ</a> » <a href="{{URL::to('cart.html')}}">Giỏ hàng</a> » <a href="">Thanh toán</a></div>
      <!--Breadcrumb Part End-->
      <h1>Thanh toán</h1>
      <div class="checkout">
        <div class="checkout-heading">Step 1: Thông tin thanh toán</div>
        <div class="checkout-content" style="display: block;">
        <form id="form_checkout" method="post" action="{{URL::to('')}}/home/order">
          <table class="form">
            <tbody>
              <tr>
                <td><span class="required">*</span> Họ tên:</td>
                <td><input type="text" class="large-field" value="{{$input['name']}}" name="name" id="name"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Giới tính:</td>
                <td>
                  <label for="nam">
                    <input type="radio" checked="checked" id="nam" value="1" name="sex">
                    <b>Nam</b></label>
                  <br>
                  <label for="nu">
                    <input type="radio" id="nu" value="0" name="sex">
                    <b>Nữ</b></label>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Điện thoại:</td>
                <td><input type="text" class="large-field" value="{{$input['phone']}}" name="phone" id="phone"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Email:</td>
                <td><input type="text" class="large-field" value="{{$input['email']}}" name="email" id="email"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Địa chỉ:</td>
                <td><input type="text" class="large-field" value="{{$input['address']}}" name="address" id="address"></td>
              </tr>
              <tr>
                <td><span class="required">*</span> Tỉnh/Thành:</td>
                <td>
                  <select class="large-field" id="city" name="provinceid">
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Quận/Huyện:</td>
                <td>
                  <select class="large-field"  id="district" name="districtid">

                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> Phường/Xã:</td>
                <td>
                  <select class="large-field"  id="ward" name="wardid">

                  </select>
                </td>
              </tr>
              <tr>
                <td>Ghi chú:</td>
                <td>
                  <textarea style="width: 98%;" rows="10" cols="40" name="content">{{$input['content']}}</textarea>
                </td>
              </tr>
              @if(CNF_RECAPTCHA =='true') 
              <tr>
                <td><span class="required">*</span> Mã bảo mật:</td>
                <td>{{ Form::captcha(array('theme' => 'white')); }}</td>
              </tr>
              @endif
            </tbody>
          </table>
      </div>
    </div>
      <div class="checkout">
        <div class="checkout-heading">Step 2: Xác nhận đơn hàng</div>
        <div class="checkout-content">
          <div class="checkout-product">
            <table>
              <thead>
                <tr>
                  <td class="name">Tên sản phẩm</td>
                  <td class="model">Danh mục</td>
                  <td class="quantity">Số lượng</td>
                  <td class="price">Giá</td>
                  <td class="total">Tổng</td>
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
                  <td class="price" colspan="4"><b>Tổng cộng:</b></td>
                  <td class="total">{{$total_real}}</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="buttons">
        <div class="right">
          <input type="submit" class="button" id="button-confirm" value="Confirm Order">
        </div>
      </div>
    </form>
    </div>
    <script>
    $(document).ready(function() { 
      $("#city").jCombo("{{ URL::to('ward/comboselect?filter=province:provinceid:name') }}",
      {  selected_value : "{{$input['provinceid']}}" });
      $("#city").on('change', function() {
        var val = this.value ; 
        $("#district").jCombo("{{ URL::to('ward/comboselect?filter=district:districtid:name:') }}"+val,
      {  selected_value : "{{$input['districtid']}}" });
      });
      $("#district").on('change', function() {
        var val = this.value ; 
        $("#ward").jCombo("{{ URL::to('ward/comboselect?filter=ward:wardid:name:') }}"+val,
      {  selected_value : "{{$input['wardid']}}" });
      });
      var validator = $("#form_checkout").validate({ 
        rules: { 
            name: "required", 
            phone: { 
                required: true, 
                number: true
            },
            email: { 
                required: true, 
                email: true
            }, 
            address: "required", 
            provinceid: "required",
            districtid: "required",
            wardid: "required",
            /*recaptcha_response_field: {
                required: true,
                remote: {
                  url: "{{URL::to('')}}/home/checkcaptcha",
                  type: "post",
                  data: {
                    recaptcha_response_field: function() {
                      return $( "#recaptcha_response_field" ).val();
                    }
                  }
                }
            },*/
        }, 
        messages: { 
            name: "Vui lòng nhập họ tên", 
            phone: { 
                required: 'Vui lòng nhập Số điện thoại', 
                number: 'Vui lòng nhập số'
            }, 
            email: { 
                required: 'Vui lòng nhập địa chỉ Email', 
                email: 'Vui lòng nhập Email hợp lệ'
            }, 
            address: "Vui lòng nhập địa chỉ", 
            provinceid: "Vui lòng chọn thành phố",
            districtid: "Vui lòng chọn Quận/Huyện",
            wardid: "Vui lòng chọn Phường/Xã",
            recaptcha_response_field: { 
                required: '<font color="red">Vui lòng nhập mã bảo vệ</font>', 
                //remote: '<font color="red">Mã bảo vệ không đúng</font>'
            }, 
        }
    }); 

    })

</script>
    </script>

















