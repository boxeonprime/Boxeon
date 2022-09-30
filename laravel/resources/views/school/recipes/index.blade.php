@php

$price = DB::table('products')
    ->whereIn('products.id', [47, 10, 8, 36, 9, 4, 48, 14, 26, 7, 41, 38, 66, 67, 53])
    ->sum('price');

@endphp

@extends('layouts.index')
@section('title', 'Boxeon.com African Meal-kits Delivered Monthly')
@section('content')
    <div id="mealkit-masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">African Meal-kits Delivered To You Monthly</h2>
            <p class="centered center font-1-5-em">Don't know how to cook African foods? Boxeon's African Staples Mealkit
                has all the ingredients and recipes you need to taste Mama Africa.
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
                    <option invalid="">Select Subscription</option>
                    <option value="1" selected="">${{ $price }} - Every month</option>
                    <option value="2">${{ $price + 1}} - Every 2 months</option>
                    <option value="3">${{ $price + 2}} - Every 3 months</option>
                    <option value="0">${{ $price + 3 }} - One-time purchase</option>
                </select>

            </form>
            <button data-quantity="1" data-name="African Staples Mealkit" data-plan="1" data-img="sisi.jpeg"
                data-id="68" data-baseprice="{{ $price }}"
                data-price="{{ $price }}" class="cart-add button center">SUBSCRIBE NOW</button>

        </aside>
        <br><br>
    </div>
    <main>

        <section class="section maxw1035 margin-bottom-4-em  mobile-scroll">
            <br>
            <h2 class="centered text-black">HOW IT WORKS</h2>
            <div id="how-it-works" class="three-col-grid">
                <div>
                    <img id="img-shopping" class="image-how-it-works" loading="lazy" src="../assets/images/shopping.webp" alt="Shopping" />
                    <h2 class="centered">Shop Kit</h2>
                    <p class="centered">Subscribe to the monthly meal kit. Flat rate shipping. Cancel anytime.</p>
                </div>
                <div>
                    <img id="img-reminder" class="image-how-it-works" loading="lazy" src="../assets/images/bike.webp" alt="Delivery" />
                    <h2 class="centered">Receive subscription</h2>
                    <p class="centered">Recieve your delivery at home. Use our recipes and instructional videos to prepare
                        your meals. </p>
                </div>
                <div>
                    <img id="img-gifts" class="image-how-it-works" loading="lazy" src="../assets/images/schedule.webp" alt="Schedule" />
                    <h2 class="centered">Adjust subscription</h2>
                    <p class="centered">Visit your subscriptions page to adjust schedule or cancel items if needed.</p>
                </div>

            </div>
        </section>
        <section class='section maxw1035 rounded-corner card'>
            <h2 class="center extra-large-font uppercase primary-color">Meals & Recipes</h2><br>
            
@include("includes.recipes-stream")

            <br>
            <section class="section margin-top-4-em">
                <h2 class="center extra-large-font uppercase primary-color">What We Ship You</h2>
                <br>
            </section>

            @include('includes.mealkit')

            <section class="section margin-top-4-em">

            <h2 class="center centered font-size-3-em primary-color">Choose schedule & subscribe!</h2><br>

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
                    <option invalid="">Select Subscription</option>
                    <option value="1" selected="">${{ $price }} - Every month</option>
                    <option value="2">${{ $price +1}} - Every 2 months</option>
                    <option value="3">${{ $price +2}} - Every 3 months</option>
                    <option value="0">${{ $price +3}} - One-time purchase</option>
                </select>

            </form>
            <button data-quantity="1" data-name="African Mealkit by Jemimah" data-plan="1" data-img="sisi.jpeg"
                data-id="68" data-baseprice="{{ $price }}"
                data-price="{{ $price }}" class="cart-add button center">SUBSCRIBE NOW</button>
        </section>
        </section>

    </main>


@endsection
