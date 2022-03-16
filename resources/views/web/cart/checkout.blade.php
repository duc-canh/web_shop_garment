@extends('web.layout.master')

@section('content')
<div class="container abc" id="blur" style="margin-bottom: 100px">
    <h2 class="check_out2">CheckOut</h2>
    <p>Fill in form below to complete your purchasel</p>

    <div class="billing_address col-md-4">
        <h4 style="font-weight: bolder">1.Billing Address</h4>

        <div class="bd_in">
            <form>
                <div style="float:left;">
                    <h4>First Name*</h4>
                    <input type="text" required>
                </div>
                <div style="float: right">
                    <h4>Last Name*</h4>
                    <input type="text" required>
                </div>
                <div style="float: left">
                    <h4>Email</h4>
                    <input type="email">
                </div>
                <div style="float:right;">
                    <h4>Phone*</h4>
                    <input type="tel" required>
                </div>
            </form>
        </div>
        <div style="float:left">
            <h4 class="address">Address*</h4>
            <input class="input_address" type="text" required>

        </div>

        <div style="float:left">
            <select class="select_province" required>
                <option>Province</option>
                <option>Nam Dinh</option>
                <option>Thai Binh</option>
                <option>Ha Noi</option>
                <option>Da Nang</option>
                <option>TP Ho Chi Minh</option>
                <option>Da Nang</option>
            </select>
            <select class="select_district" required>
                <option>District</option>
                <option>An Phu</option>
                <option>Chau Phu</option>
                <option>Chau Thanh</option>
                <option>Cho Moi</option>
                <option>Tri Ton</option>
                <option>Chau Doc</option>
            </select>
            <select class="select_ward" required>
                <option>Ward</option>
                <option>Chi Lang</option>
                <option>Nha Bang</option>
                <option>Chau Nui</option>
                <option>Vinh Trung</option>
                <option>Tan Hung</option>
                <option>Hung Hoa</option>
            </select>
            <div class="save_info">
                <input type="checkbox">  Save contact info for later
            </div>
            <br>
        </div>
        </form>

    </div>

    <div class="shipping method col-md-3">
        <h4 style="font-weight: bolder">2.Shipping Method</h4>

        <input type="radio" name="shipping" id="ems" checked>
        <label for="ems">(EMS) Express Mail Service ($20.00)
            <img style="float: right" src="../images/ems.png" width="30%">
        </label>
        <input type="radio" name="shipping" id="ghn">
        <label for="ghn">(GHN) Giao Hang Nhanh ($20.00)
            <img src="../images/ghn.png" width="30%">

        </label>
        <input type="radio" name="shipping" id="vnpost">
        <label for="vnpost">VN Post ($15.00)
            <img style="margin-right: 0px" src="../images/vnpost.png" width="30%">


        </label>
        <input type="radio" name="shipping" id="fedex">
        <label for="fedex">(FED) Federal Express ($25.00)
            <img style="margin-right: 0px" src="../images/fedex.png" width="30%">
        </label>
        <br>
    </div>

    <div class="payment method col-md-4">
        <h4 style="font-weight: bolder">3.Payment Method</h4>
        <input type="radio" name="payment" checked="checked" id="cash">
        <label for="cash">Cash On Delivery
            <img src="../images/cashondelivery.png" width="15%">
            <!--            <i class="fas fa-money-bill-wave fa-2x"></i>-->
        </label>
        <input type="radio" name="payment" id="credit">
        <label for="credit" >Credit Card
            <img src="../images/credit.png" width="40%">
            <!--            <i class="fas fa-credit-card fa-2x"></i>-->

        </label>
        <input type="radio" name="payment" id="paypal">
        <label for="paypal" >PayPal
            <img src="../images/logo-paypal.png.png" width="30%">

            <!--            <i class="fab fa-paypal fa-2x"></i>-->
        </label>

        <h4 class="voucher">Voucher</h4>
        <input class="enter_code" type="text" placeholder="Enter Voucher Code">
        <button type="button" class="apply">Apply</button>

        <h4 style="font-weight: bold">Order Summary:</h4>
        <div style="float:left;">
            <h5>Subtotal(4 Items) :</h5>
            <h5>Shipping Fee:</h5>
            <h5>Voucher:</h5>
        </div>

        <div style="float:right;">
            <h5>$1480.00</h5>
            <h5>$20.00</h5>
            <h5>$100.00</h5>
        </div>

        <div class="bar">
        </div>

        <div>
            <h5 style="float: left">Total:</h5>
            <h5 style="float:right;">$1360.00</h5>
        </div>

        <div class="order">
            <button type="submit" class="order_now" onclick="toggle()">ORDER NOW
            </button>
        </div>
        <br>

    </div>


</div>
<div id="popup">
    <img src="../images/logo1-gm.png">
    <h3>Thank you!</h3>
    <h4>We have received your order. Please wait 2-3 days for the shipping department to deliver your order.Please check your email for more details about your order</h4>
    <h3>Best Regards!</h3>
    <button type="submit" class="order_now" onclick="toggle()">CLOSE</button>
</div>

@endsection