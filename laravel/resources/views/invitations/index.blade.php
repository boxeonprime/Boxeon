@extends('layouts.index')
@section('title', 'African Snacks Delivery Service | Boxeon')
@section('og:image',  asset('../assets/images/logo_square.png'))
@section('og:image:alt',  asset('../assets/images/logo_square2.png')) 
@section('keywords',  "Boxeon, African Subscription Box, African Snack Box, Nigerian Cuisine, Caribbean Foods, African Food Recipes")
@section('description',  "Boxeon is an African snacks and food delivery service helping the diaspora automate and repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free foods - this offer ends soon.")
@section('content')
    <div id="gifts-masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">Gift A Special Someone A Taste Of Home</h2>
            <p class="centered center font-1-5-em">Send your friend or relative some African snacks from their childhood to
                satisfy their nostalgia.</p><br>
            <a href="#whatis" class="button uppercase">GET STARTED</a>
        </aside>
        <br><br>
    </div>
    <main> <a id='whatis' href='#whatis'></a>

        <section class="section maxw1035 margin-bottom-4-em  mobile-scroll">
            <br>
            <h2 class="centered text-black">HOW IT WORKS</h2>
            <div id="how-it-works" class="three-col-grid">
                <div>
                    <img id="img-gifts" class="image-how-it-works" src="../assets/images/gifts.svg" alt="Gifts" />
                    <h2 class="centered">Shop gifts</h2>
                    <p class="centered">Choose the African foods you want, then select your quantity and subscription
                        schedule.</p>
                </div>
                <div>
                    <img id="img-reminder" class="image-how-it-works" src="../assets/images/reminder.svg" alt="Reminder" />
                    <h2 class="centered">Place order</h2>
                    <p class="centered">Click "Add to Cart" and then "Proceed to Checkout". Flat rate shipping. Cancel
                        anytime.</p>
                </div>
                <div>
                    <img id="img-shopping" class="image-how-it-works" src="../assets/images/delivered.webp"
                        alt="Shopping" />
                    <h2 class="centered">We ship your gifts</h2>
                    <p class="centered">Provide the recipient's address upon checkout. We'll handle the rest.</p>
                </div>

            </div>

        </section>

        @include('includes.gifts')

    </main>
@endsection
