
@extends('web.layout.master')
@section('content')


<div class="container cart" style="margin-bottom: 100px">

    <table >
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Save</th>
                <th>Subtotal</th>

            </tr>
        </thead>
        <tbody >
            @if(Session::has('Cart') != null)
            @foreach(Session::get('Cart')->products as $item)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{ $item['productInfo']->imageUrl() }}">
                        <div>
                            <p>{{ $item['productInfo']->title }}</p>
                            <small>Price: {{ number_format($item['productInfo']->price) }}</small>
                            </br>
                           
                           <button class="DeleteListCartItem" data-id="{{ $item['productInfo']->id }}" class="button-remove">Remove</button> 


                        </div>
                    </div>
                </td>
                <td>
                    <div class="button_quantity">
                        <input class="minus"onclick="var result = document.getElementById('quanty-item-{{ $item['productInfo']->id }}');
                        var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;" type='button' value='-' />
                        <input id="quanty-item-{{$item['productInfo']->id }}" class="qt1" min='1' name='qt1' type='text' value="{{ $item['quanty']}}" />
                        <input class="plus" onclick="var result = document.getElementById('quanty-item-{{$item['productInfo']->id }}');
                        var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
                    </div>
                   <!-- <div>Quanty : {{ $item['quanty']}}</div> -->
                </td>
                <td> <button class="SaveListCartItem" data-id="{{ $item['productInfo']->id }}" class="button-remove">Save</button> </td>
                <td style="font-weight: 700"> {{ number_format($item['price'])  }} </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <div class="total-price">
        <table>
        @if(Session::has('Cart') != null)
            <tr>
                <div>
                    <td style="font-weight: 700">Total Quanty:</td>
                    <td style="font-weight: 700">{{ number_format(Session::get('Cart')->totalQuanty)}}</td>
                </div>
            </tr>
            <tr>
                <div>
                    <td style="font-weight: 700">Total Price:</td>
                    <td style="font-weight: 700">{{ number_format(Session::get('Cart')->totalPrice)}}</td>
                </div>
            </tr>
            <tr>
                <td>
                    <button class="check_out"  onclick="window.location.href='https://garments-shop.herokuapp.com/checkout'" >Proceed to checkout
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>


                </td>
            </tr>
            @endif
        </table>
    </div>
</div>

<script src="/web//js/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function() {
        $('.DeleteListCartItem').click(function(id) {
          
            alert($(this).data("id"));
            
        $.ajax({
            type: "get",
            url: '/Delete-Item-Cart/'+$(this).data("id"),
            data: $(this).serialize(),
            success: function(response)
            {
                $("body").empty();
                $("body").html(response);
               
              
           }
       });
      });

      $('.SaveListCartItem').click(function(e) {
          
          //alert($(this).data("id"));
         
         var id = $(this).data("id");
         console.log(id)
       console.log($("#quanty-item-"+id).val())
         
      $.ajax({
          type: "get",
          url: '/Save-Item-Cart/'+$(this).data("id")+'/'+$("#quanty-item-"+id).val(),
          data: $(this).serialize(),
          success: function(response)
          {
              $("body").empty();
              $("body").html(response);
             
            
         }
     });
    });
 });
</script>


@endsection