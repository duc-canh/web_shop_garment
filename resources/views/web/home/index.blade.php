@extends('web.layout.master')
@section('title')
Home
@endsection

@section('head2')
<div class="row">
            <div class="col-2">
                <h1>Give Your Workout</br> A new style</h1>
                <p>Success The Repulican National Committee slammed the exchange,</br>
                    which came three days aft ISIS-K terrorists attacked
                </p>
                <a href="#" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="/web/images/image1.png">
            </div>
        </div>
@endsection

@section('content')
<div class="categories">
    <div class="small-container">
        <div class="row wow fadeInDown" data-wow-duration="1s" id="row-fn">
            <div class="col-3">
                <img src="/web/images/category-1.jpg">
            </div>
            <div class="col-3">
                <img src="/web/images/category-4.jpg">
            </div>
            <div class="col-3">
                <img src="/web/images/category-3.jpg">
            </div>
        </div>
    </div>

</div>


<div class="container products" style="margin-bottom: 100px">


    <h2 class="title">Featured Products</h2>
    <div class="col-md-12">
        @foreach($features as $feature)
        <div class="">
            <div class="col-4 col-md-3">

                <img src="{{ $feature->imageUrl() }}">
                <h4><a href="{{ route('web.detail', $feature->slug )}}">{{ $feature->title }}</a></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>{{ $feature->price }} $</p>
                <p>Lượt xem {{ $feature->view_count }}</p>
                <a href="javascript:void(0)" class="btnb btn-buy-now" role="button">Add Cart </a>

            </div>
        </div>
        @endforeach
       
    </div>



</div>

<div class="container products" style="margin-bottom: 100px">


    <h2 class="title">Latest Products</h2>
    <div class="col-md-12">

    @foreach($latests as $latest)
        <div class="">
            <div class="col-4 col-md-3">

                <img src="{{ $latest->imageUrl() }}">
                <h4><a href="https://garments-shop.herokuapp.com/product-details">{{ $latest->title }}</a></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>{{ $latest->price }} $</p>
                <p>Lượt xem {{ $latest->view_count }}</p>
                <a href="javascript:void(0)" class="btnb btn-buy-now" role="button">Add Cart </a>

            </div>
        </div>
        @endforeach>
      
    </div>



</div>





<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="/web/images/dqa.jpg" class="offer-image">
            </div>
            <div class="col-2">
                <p>Exclusive Available on Gracious Garments</p>
                <h1>ASOS DESIGN</h1>
                <div class="small"> The domestic textile and garment industry faced an export value reduction
                    in the first four months of this year due to difficulties in production
                    due to the COVID-19 pandemic</div>
                <a href="#" class="btn">Buy now</a>
            </div>
        </div>
    </div>
</div>


<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>The total textile and garment export value in the
                    first four months of this year dropped by 6.6 per cent
                    to US$10.64 billion year-on-year</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/web/images/user-1.png">
                <h3>Jerry</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>The total textile and garment export value in the
                    first four months of this year dropped by 6.6 per cent
                    to US$10.64 billion year-on-year</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/web/images/user-2.png">
                <h3>Justin baby</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>The total textile and garment export value in the
                    first four months of this year dropped by 6.6 per cent
                    to US$10.64 billion year-on-year</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/web/images/user-3.png">
                <h3>Tom</h3>
            </div>
        </div>
    </div>
</div>


<div class="brand">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="/web/images/logo-godrej.png">
            </div>
            <div class="col-5">
                <img src="/web/images/logo-oppo.png">
            </div>
            <div class="col-5">
                <img src="/web/images/logo-paypal.png.png">
            </div>
            <div class="col-5">
                <img src="/web/images/logo-philips.png">
            </div>
            <div class="col-5">
                <img src="/web/images/logo-coca-cola.png">
            </div>
        </div>
    </div>
</div>
@endsection
