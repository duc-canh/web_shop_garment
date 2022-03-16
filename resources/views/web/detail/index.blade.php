@extends('web.layout.master')
@section('title')
Home
@endsection



@section('content')
<div id="change-item-cart"></div>
<div class="containerb single-product">
    <div class="row">
        <div class="col-2">
            <img src="{{ $detail->imageUrl() }}" width="100%" id="ProductImg">
        </div>
        <div class="col-2">
            <p>Home / T-Shirt</p>
            <h1>{{ $detail->title }}</h1>
            <h4>{{ $detail->price }} $</h4>
            <h4>Lượt xem {{ $detail->view_count }}</h4>
            <select id="size">
                <option >Select Size</option>
                <option value="xxl">XXL</option>
                <option value="xl">XL</option>
                <option value="large">Large</option>
                <option value="medium">Medium</option>
                <option value="small">Small</option>
            </select>
            <input style="margin-left: 15px;padding-right: 10px" onclick="var result = document.getElementById('quantity');
                var qty = result.value; if( !isNaN(qty) &amp; qty > 1 ) result.value--;return false;" type='button' value='-' />
            <input style="padding-left: 21px" id='num' min='1' name='quantity' type='text' value='1' />
            <input style="padding-right: 10px" onclick="var result = document.getElementById('quantity');
                 var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+' />
            <a   href="{{ route('web.cart.addCart',$detail->id )}}" class="btn">Add To Cart</a>

            <p><b>Description</b></p>
            <p>Whether it’s an embroidered logo, a bold graphic print or its iconic red, white and blue colour-blocking, there’s no mistaking Tommy Hilfiger. Flying the flag for all things retro 90s, scroll our Tommy Hilfiger at ASOS edit, featuring wardrobe-ready casualwear – think T-shirts,</p>
            <table border="0" class="more-details">
                <tr>
                    <th rowspan="6"><p>Product Details</p></th>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            <table border="0" class="more-details">
                <tr>
                    <th><p>Product Code :<span>22223456</span></p></th>
                    <td></td>
                </tr>
            </table>
            <table border="0" class="more-details">
                <tr>
                    <th rowspan="2"><p>Quantity available : <span>50</span> </p></th>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            <table border="0" class="more-details">
                <tr>
                    <th><p>Look After Me :  <span>Machine wash according to instructions on care label </span></p></th>
                    <td></td>
                </tr>
            </table>
            <table border="0" class="more-details">
                <tr>
                    <th rowspan="3"><p>Ingredient : <span> 100% Cotton. </span></p></th>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!--compare-->
<div class="small-container">
    <h2 class="titlepd">Compare Products</h2>
    <div class="compare">
        <div class="row">
            @foreach($relate as $ral)
            <div class="compare-product" id="1st">
                <img src="{{ $ral->imageUrl() }}">
                <h3>{{ $ral->title }}</h3>
                <table border="0" class="more-details">
                    <tr>
                        <th rowspan="6"><p>Product Details:</p></th>
                        <td>For the rotation</td>
                    </tr>
                    <tr>
                        <td>Crew neck</td>
                    </tr>
                    <tr>
                        <td>Short sleeves</td>
                    </tr>
                    <tr>
                        <td>Nike branded print to chest</td>
                    </tr>
                    <tr>
                        <td>Regular fit</td>
                    </tr>
                    <tr>
                        <td>True to size</td>
                    </tr>
                </table>
                <table border="0" class="more-details">
                    <tr>
                        <th rowspan="1"><p>Product Code :</p></th>
                        <td>2018265</td>
                    </tr>
                </table>
                <table border="0" class="more-details">
                    <tr>
                        <th rowspan="1"><p>Quantity available :</p></th>
                        <td>{{ $ral->inventory }}</td>
                    </tr>
                </table>
                <table border="0" class="more-details">
                    <tr>
                        <th><p>Look After Me :</p></th>
                        <td>Machine wash according to instructions on care label</td>
                    </tr>
                </table>
                <table border="0" class="more-details">
                    <tr>
                        <th rowspan="2"><p>Size & Fit:</p></th>
                        <td>Model's height: 6'2.5”/189 cm</td>
                    </tr>
                    <tr>
                        <td>Model is wearing: Size Medium</td>
                    </tr>
                </table>
            </div>
            @endforeach
           
        </div>
    </div>
</div>

<!--comment-->
<div class="small-container">
    <div class="comment-box">
        <h2>Product Reviews</h2>
        <h3>{{ $comments->count() }} comments </h3>
        @foreach($comments as $comment)
        <p>{{ $comment->user->name }}</p>
        <div class="comment">
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="comment-row">
               
                <div class="comment-date">
                    <p>1:45 AM 9/22/2021</p>
                </div>
            </div>
            <div class="comment-body">
                <p>{{ $comment->content}}</p>
            </div>
        </div>
        @endforeach
       
    </div>
    <div>
        @if(\Illuminate\Support\Facades\Auth::check())
        <p>Bình luận của bạn</p>
        <form method="post" action="{{ route('web.detail.comment',$detail->id )}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Content</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="content">
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        @endif
    </div>
</div>

@endsection

<!-- @section('scripts')
<script>
    function AddCart(id){
        $.ajax({
            url:'AddCart/'.id,
            type:'Get',
        }).done(function(response){
            console.log('abc');
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
        });
    }
</script>
@endsection -->