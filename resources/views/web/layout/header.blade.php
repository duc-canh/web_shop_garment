<div class="navbara" id="menuTop">
    <div class="logo">
        <img src="/web/images/logo1-gm.png" width="125px"/>
    </div>
    <nav>
        <ul id="MenuItem">
            <li class="seach">
                    <div class="box-seach">
                        <input class="sr" type="text" name="keyword"placeholder="Search..."/>
                        <button type="submit" class="glyphicon glyphicon-search"></button>
                    </div>

                </form>
            </li>
            <li><a href="https://garments-shop.herokuapp.com/">Home</a> </li>
            <li><a href="https://garments-shop.herokuapp.com/products">Products</a> </li>
            <li><a href="https://garments-shop.herokuapp.com/about">About</a> </li>
            <li><a href="https://garments-shop.herokuapp.com/contact">Contact Us</a> </li>
            <li><a href="{{ route('web.loginform') }}">Account</a> </li>
        </ul>
    </nav>
    <a href="{{ route('web.cart')}}" id="card-shop" class="ps">
        <img src="/web/images/cart.png" width="30px" height="30px">
        <span id="count-item" data-count="0"><span>0 Item</span></span>
    </a>
    <img src="../images/menu.png" class="menu-icon" onclick="menutoggle()">

</div>
