@php

$price = 40;

@endphp

@extends('layouts.index')
@section('title', 'Meal kit Delivery Service | Boxeon')
@section('og:image', asset('../assets/images/logo-square.webp'))
@section('og:image:alt', asset('../assets/images/logo-square2.webp'))
@section('keywords', 'Boxeon, African Subscription Box, African Snack Box, Nigerian Cuisine, Caribbean Foods, African
    Food Recipes')
@section('description', 'Boxeon is an African food and meal kit delivery service helping the diaspora automate and
    repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free
    foods - this offer ends soon.')
@section('content')
    <div id="mealkit-masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">30-Minute Reliable Meal-kits Delivered Monthly</h2>
            <p class="centered center font-1-5-em">Take stress out of mealtime. Subscribe to receive meal-kits for the best West African, Caribbean and American fusion meals. Cancel anytime.
            </p><br>
            <form class="form-plan center">
                <select class="select-plan margin-top-zero" name="quantity">
                    <option invalid="">Select Quantity</option>
                    <option selected="" value="1">Qty: 1</option>
                    <option value="2">Qty: 2</option>
                    <option value="3">Qty: 3</option>
                    <option value="4">Qty: 4</option>
                    <option value="5">Qty: 5</option>
                    <option value="6">Qty: 6</option>
                    <option value="7">Qty: 7</option>
                </select>
                <select class="select-plan margin-top-zero" data-product="2" data-price="{{ $price }}"
                    name="plan">
                    <option invalid=""selected="">Select Subscription</option>
                    <option value="1">${{ $price }} - Every month</option>
                    <option value="2">${{ $price + 5 }} - Every 2 months</option>
                    <option value="3">${{ $price + 7 }} - Every 3 months</option>
                    <option value="0">${{ $price + 9 }} - One-time purchase</option>
                </select>

            </form>
            <button data-quantity="1" data-name="30-Minute Reliable Meal-kit" data-plan="1" data-img="sisi.webp" data-id="68"
                data-baseprice="{{ $price }}" data-price="{{ $price }}"
                class="cart-add button center">SUBSCRIBE NOW</button>

        </aside>
        <br><br>
    </div>
    <main>

        <section class="section maxw1035 margin-bottom-4-em  mobile-scroll">
            <br>
            <h2 class="centered text-black">HOW IT WORKS</h2>
            <div id="how-it-works" class="three-col-grid">
                <div>
                    <img id="img-shopping" class="image-how-it-works" loading="lazy" src="../assets/images/shopping.webp"
                        alt="Shopping" />
                    <h2 class="centered">Select Meals</h2>
                    <p class="centered">Scroll down and select the meals you want to enjoy. Flat rate shipping. Cancel anytime.</p>
                </div>
                <div>
                    <img id="img-reminder" class="image-how-it-works" loading="lazy" src="../assets/images/bike.webp"
                        alt="Delivery" />
                    <h2 class="centered">Subscribe</h2>
                    <p class="centered">Select how often you want to recieve your delivery, subscribe - we'll handle the rest. </p>
                </div>
                <div>
                    <img id="img-gifts" class="image-how-it-works" loading="lazy" src="../assets/images/schedule.webp"
                        alt="Schedule" />
                    <h2 class="centered">Adjust subscription</h2>
                    <p class="centered">Visit your subscriptions page to adjust schedule or cancel items if needed.</p>
                </div>

            </div>
        </section>
        <section class='section maxw1035 rounded-corner card'>
            <h2 class="center centered font-size-3-em uppercase primary-color">Select Your Meals</h2>
            <p class="centered">Select the meals you want to enjoy in your meal kit by clicking the plus (+) sign.</p>
           

            @include('includes.recipes-stream')

            <br>
            <section class="section margin-top-4-em">
                <h2 class="center font-size-3-em  uppercase primary-color">What We Ship You</h2>
                <p class="centered">We'll send you all the cut, portioned, and labeled ingredients to prepare<br> your selected meals and include the simple steps on how to<br> put everything together.</p>
         
                <form class="form-plan center">
                    <select class="select-plan margin-top-zero" name="quantity">
                        <option invalid="">Select Quantity</option>
                        <option selected="" value="1">Qty: 1</option>
                        <option value="2">Qty: 2</option>
                        <option value="3">Qty: 3</option>
                        <option value="4">Qty: 4</option>
                        <option value="5">Qty: 5</option>
                        <option value="6">Qty: 6</option>
                        <option value="7">Qty: 7</option>
                    </select>
                    <select class="select-plan margin-top-zero" data-product="2" data-price="{{ $price }}"
                        name="plan">
                        <option invalid="" selected="">Select Subscription</option>
                        <option value="1">${{ $price }} - Every month</option>
                        <option value="2">${{ $price + 5 }} - Every 2 months</option>
                        <option value="3">${{ $price + 7 }} - Every 3 months</option>
                        <option value="0">${{ $price + 9 }} - One-time purchase</option>
                    </select>

                </form>
                <button data-quantity="1" data-name="30-Minute Reliable Meal-kit" data-plan="1" data-img="sisi.webp"
                    data-id="68" data-baseprice="{{ $price }}" data-price="{{ $price }}"
                    class="cart-add button center">SUBSCRIBE NOW</button>
            </section>
        </section>

    </main>


@endsection
