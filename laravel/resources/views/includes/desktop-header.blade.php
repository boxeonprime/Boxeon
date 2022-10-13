@include('includes.http-headers')
<span></span><!-- Hack !-->
<header>
    <span id="top-bar"></span>
    <div id="header-inner-wrapper">
        <span class="hide"></span>
        <a id='logo' href="/" title='Boxeon'>
            <img id='logo' width="127px" height="30px" src='{{ asset('../assets/images/logo.webp') }}' alt='logo' />
        </a>
       
        <a class="button text-yellow hide" href="/shop/index?c=staple" title="Shop">Shop</a>
        <a class="button text-yellow hide" href="/mealkit" title="Meal Kit">Meal Kit</a>
        <a class="button text-yellow hide" href="/recipes" title="Recipes">Recipes</a>
        <span class="hack"></span>

        @auth
            <a href="/gifts" class="button one-em-font hide">Gifts‬</a>
            <a href="/cart/index" class="white button"><span><img id="cart" width="30px" height="auto"  src='{{ asset('../assets/images/cart.webp') }}'
                        alt="Cart" /></span><span class="cart-count text-cart-count text-yellow"></span></a>
        @endauth
        @if (!Auth::check())
        <a href="/gifts" class="button one-em-font hide">Gifts‬</a>
            <a href="/cart/index" class="white button"><span><img width="30px" height="21"
                        src="../assets/images/cart.webp" alt="Cart" /></span><span class="cart-count text-cart-count text-yellow"></span></a>
        @endif
        <div class="p-relative">
            <a id="showDropdown" class='fadein button margin-right-1-em m-padding-right-zero' href='#'><span><img id="user-icon" class="w30px" width="30px" height="30px" src='{{ asset('../assets/images/account_circle.svg') }}'
                alt="Account" /></span>
            </a>
            
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a class='one-em-font' href='/login'>Sign in
                    </a>
                    <a class="one-em-font" href="/home/index">Subscriptions</a>
                    <a class="one-em-font" href="/account/home">Account</a>
                    <a class="one-em-font" href="/signout">Sign Out</a>
                </div>
            </div>
            <span class="hide"></span>
        </div>
       
    </div>
</header>
