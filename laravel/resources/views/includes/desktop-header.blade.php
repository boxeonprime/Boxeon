@include('includes.http-headers')
<span></span><!-- Hack !-->
<header>
    <span id="top-bar"></span>
    <div id="header-inner-wrapper">
        <span class="hide w900hide"></span>
        <a id='logo' href="/" title='Boxeon'>
            <img id='logo' width="127px" height="50px" src='{{ asset('../assets/images/logo.webp') }}' alt='logo' />
        </a>
        
        <a class="button hide" href="/menus" title="Weekly Menu">Weekly Menus</a>
        <a class="button hide" href="/plans" title="Plans">Our Plans</a>
        <a class="button hide w100per" href="/shop/promo" title="Promo">Get 16 Free Meals + 3 Surprise Gifts<img id="white-arrow" width="15px" height="15px" src="../assets/images/arrow_forward-white.webp"></a>
        <span class="hack"></span>

        @auth
       <span></span>
            <a href="/cart/index" class="white button"><span><img id="cart" class="w30px" width="30px" height="24px"  src='{{ asset('../assets/images/cart.webp') }}'
                        alt="Cart" /></span><span class="cart-count text-cart-count text-yellow"></span></a>
        @endauth
        @if (!Auth::check())
        <span></span>
            <a href="/cart/index" class="white button"><span><img width="30px" height="21"
                        src="../assets/images/cart.webp" alt="Cart" /></span><span class="cart-count text-cart-count text-yellow"></span></a>
        @endif
        <div id="account-circle-wrapper" class="p-relative">
            <a id="showDropdown" class='button margin-right-1-em m-padding-right-zero' href='#'><span><img id="user-icon" class="w30px" width="30px" height="30px" src='{{ asset('../assets/images/account_circle.svg') }}'
                alt="Account" /></span>
            </a>
            
            <div class="dropdown">
                <div id="myDropdown" class="dropdown-content">
                    <a class='one-em-font' href='/login'>Sign in
                    </a>
                    <a class="one-em-font" href="/dashboard">Dashboard</a>
                    <a class="one-em-font" href="/account/home">Account</a>
                    <a class="one-em-font" href="/signout">Sign Out</a>
                </div>
            </div>
            <span class="hide"></span>
        </div>
       
    </div>
</header>
