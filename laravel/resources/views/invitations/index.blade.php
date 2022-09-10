@extends('layouts.index')
@section('title', 'Boxeon.com Give Someone You Love A Taste Of Africa')
@section('content')
    <div id="gifts-masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">Gift A Special Someone A Taste Of Home</h2>
            <p class="centered center font-1-5-em">Send your friend or relative some African snacks from their childhood to satisfy their nostalgia.</p><br>
            <a href="#whatis" class="button uppercase">GET STARTED</a>
        </aside>
        <br><br>
    </div>
    <main> <a id='whatis' href='#whatis'></a>
        
        <section class="section maxw1035 margin-bottom-4-em  mobile-scroll">
            <br>
            <h2 class="centered">HOW IT WORKS</h2>
            <div id="how-it-works" class="three-col-grid">
                <div>
                    <img id="img-gifts" class="image-how-it-works" src="../assets/images/gifts.svg" alt="Gifts" />
                    <h2 class="centered">Shop gifts</h2>
                    <p class="centered">Choose the African foods you want, then select your quantity and subscription schedule.</p>
                </div>
                <div>
                    <img id="img-reminder" class="image-how-it-works" src="../assets/images/reminder.svg" alt="Reminder" />
                    <h2 class="centered">Place order</h2>
                    <p class="centered">Click "Add to Cart" and then "Proceed to Checkout". Flat rate shipping. Cancel anytime.</p>
                </div>
                <div>
                    <img id="img-shopping" class="image-how-it-works" src="../assets/images/delivered.png" alt="Shopping" />
                    <h2 class="centered">We ship your gifts</h2>
                    <p class="centered">Provide the recipient's address upon checkout. We'll handle the rest.</p>
                </div>
        
            </div>

        </section>
        
        @include('includes.gifts')
        
        <section id="creators-bar" class="max-width-1035 section  mobile-scroll display-none">
            <div class="center div-horizontal-rule"></div>
            <h2 class="centered primary-color">BEST SELLERS</h2>
            <div id="as-seen-on" class="four-col-grid">
                @php
                    $sellers = DB::table('products')
                        ->where('category', '=', 'Snack')
                        ->take(4)
                        ->get();
                    
                @endphp
                @for ($i = 0; $i < count($sellers); $i++)
                    <div>
                        <a href="/shop/item?id={{ $sellers[$i]->id }}">
                            <img class="maxw200px" src="../assets/images/products/{{ $sellers[$i]->img }}"></a>
                        <a class="" href="/shop/item?id={{ $sellers[$i]->id }}">
                            <p>{{ $sellers[$i]->name }}</p>
                        </a>
                    </div>
                @endfor
            </div>
        </section>
    </main>
@endsection
