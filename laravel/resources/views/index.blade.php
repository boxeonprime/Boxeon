@extends('layouts.index')
@section('title', 'African Food And Meal Kit Delivery Service | Boxeon')
@section('og:image',  asset('../assets/images/logo_square.png'))
@section('og:image:alt',  asset('../assets/images/logo_square2.png')) 
@section('keywords',  "Boxeon, African Subscription Box, African Snack Box, Nigerian Cuisine, Caribbean Foods, African Food Recipes")
@section('description',  "Boxeon is an African food and meal kit delivery service helping the diaspora automate and repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free foods - this offer ends soon.")
@section('content')
    <div id="masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">African Groceries Delivered To You Monthly</h2>
            <p class="centered center font-1-5-em">Home in a box. Subscribe to monthly deliveries of your favorite foods from
                home
                to save time and money. Cancel anytime.</p><br>
            <a href="/shop/index?c=staple" class="button uppercase">SUBSCRIBE NOW</a>
        </aside>
        <br><br>
    </div>
    <main> <a id='whatis' href='#whatis'></a>
        @include('includes.works')
        <section class="block maxw1035 section">
          
                <div class="learn-more-index-wrapper">
                    <img class="float-left h50px border-radius margin-right-1-em border-yellow"
                        src="../assets/images/tabitha-girl.webp" alt="Charitable Giving" />
                    <a class="learn-more" href="/school/subscriptions">
                        <h2>Learn more about Boxeon subscriptions</h2>
                    </a>
            </div>
        </section>
        
      @include('includes.shop-products')
        
    </main>
@endsection
