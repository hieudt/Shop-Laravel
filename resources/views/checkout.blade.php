@extends('includes.master')
@section('content')
    <style>
        .mgg {
            background-color:white !important;
            color:black !important;
        }

        .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  padding: 5px 20px 15px 20px;

}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
    </style>
    <section class="go-section">
        <div class="row">
            <div class="container">
                <div class="col-md-offset-2 col-md-8">
                </div>
                <div class="col-md-12 text-center services">
                    <div class="col-md-12 order-div">
                        <div class="col-md-7 order-left">
                            <h4>ENTER SHIPPING DETAILS</h4>
                            <form class="col-md-offset-2 col-md-8" action="" method="post" id="payment_form">
                                {{csrf_field()}}

                                <div class="row">
                                        <div class="col-50">
                                          <h3>Billing Address</h3>
                                          <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                          <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                                          <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                          <input type="text" id="email" name="email" placeholder="john@example.com">
                                          <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                          <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                          <label for="city"><i class="fa fa-institution"></i> City</label>
                                          <input type="text" id="city" name="city" placeholder="New York">
                              
                                          <div class="row">
                                            <div class="col-50">
                                              <label for="state">State</label>
                                              <input type="text" id="state" name="state" placeholder="NY">
                                            </div>
                                            <div class="col-50">
                                              <label for="zip">Zip</label>
                                              <input type="text" id="zip" name="zip" placeholder="10001">
                                            </div>
                                          </div>
                                        </div>
                              
                                        <div class="col-50">
                                          <h3>Payment</h3>
                                          <label for="fname">Accepted Cards</label>
                                          <div class="icon-container">
                                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                                          </div>
                                          <label for="cname">Name on Card</label>
                                          <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                          <label for="ccnum">Credit card number</label>
                                          <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                          <label for="expmonth">Exp Month</label>
                                          <input type="text" id="expmonth" name="expmonth" placeholder="September">
                              
                                          <div class="row">
                                            <div class="col-50">
                                              <label for="expyear">Exp Year</label>
                                              <input type="text" id="expyear" name="expyear" placeholder="2018">
                                            </div>
                                            <div class="col-50">
                                              <label for="cvv">CVV</label>
                                              <input type="text" id="cvv" name="cvv" placeholder="352">
                                            </div>
                                          </div>
                                        </div>
                              
                                      </div>
                                      <label>
                                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                                      </label>
                                      <button type="submit" class="button style-10"> Order Now</button>
                            </form>
                            <div class="col-md-12">
				<a href="" style="color:#010101;">Tôi muốn sử dụng tài khoản của tôi ?</a>
				</div>
                        </div>
                        <div class="col-md-5 order-right">
                            <h4>CHI TIẾT ĐƠN HÀNG</h4>
                            <div class="pricing-list">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Màu Sắc</th>
                                        <th>Kích Thước</th>
                                        <th width="20%">Số Lượng</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cartCheckOut">

                                    </tbody>
                                </table>
                                <table class="table">
                                    <tr>
                                        
                                            <div id="MaGiamGia">
                                                @if(session()->get('coupon'))
                                                <h5 class="mgg">Giá cũ {{formatMoney(Cart::subtotal())}}</h5>
                                                <h5 class="mgg">Giảm giá theo mã : -{{session()->get('coupon')['discount']}}%</h5>
                                                @endif
                                            </div>
                                        
                                    </tr>
                                    <tr>
                                        <td><h3 class="pricing-count" style="margin: 0">Thành Tiền:</h3></td>
                                        <td width="30%"><h3 class="pricing-count" id="grandtotal" style="margin: 0">0</h3></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop
@section('footer')
    <script type="text/javascript">
        function meThods(val) {
            var action1 = "";
            var action2 = "";
            var action3 = "";
            if (val.value == "Paypal") {
                $("#payment_form").attr("action", action1);
                $("#stripes").hide();
            }
            if (val.value == "Stripe") {
                $("#payment_form").attr("action", action2);
                $("#stripes").show();
            }
            if (val.value == "Cash") {
                $("#payment_form").attr("action", action3);
                $("#stripes").hide();
            }
        }
    </script>
@stop