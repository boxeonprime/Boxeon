@php

                
$price = DB::table('products')
    ->whereIn('products.id', [47, 10, 8, 36, 9, 4, 48, 14, 26, 7, 41, 38, 53])
    ->sum('price');

@endphp

@extends('layouts.index')
@section('title', 'Boxeon.com African Foods Recipes')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
@section('content')
    <div id="mealkit-masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">African Meal-kits Delivered To You Monthly</h2>
            <p class="centered center font-1-5-em">Don't know how to cook African foods? Boxeon's African Staples Mealkit
                has all the ingredients and recipes you need to taste Mama Africa. Subscribe now. Cancel anytime.
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
                    <option value="2">${{ $price }} - Every 2 months</option>
                    <option value="3">${{ $price }} - Every 3 months</option>
                    <option value="0">${{ $price }} - One-time purchase</option>
                </select>

            </form>
            <button data-quantity="1" data-name="African Staples Mealkit" data-plan="1" data-img="sisi.jpeg"
                data-id="65" data-baseprice="{{ $price }}" data-price="{{ $price }}" class="cart-add button center">SUBSCRIBE NOW</button>
                
        </aside>
        <br><br>
    </div>
    <main>

        <section class="section maxw1035 margin-bottom-4-em  mobile-scroll">
            <br>
            <h2 class="centered">HOW IT WORKS</h2>
            <div id="how-it-works" class="three-col-grid">
                <div>
                    <img id="img-shopping" class="image-how-it-works" src="../assets/images/shopping.png" alt="Shopping" />
                    <h2 class="centered">Shop Kit</h2>
                    <p class="centered">Subscribe to the monthly meal kit. Flat rate shipping. Cancel anytime.</p>
                </div>
                <div>
                    <img id="img-reminder" class="image-how-it-works" src="../assets/images/bike.png" alt="Delivery" />
                    <h2 class="centered">Recieve subscription</h2>
                    <p class="centered">Recieve your delivery at home. Use our recipes and instructional videos to prepare
                        your meals. </p>
                </div>
                <div>
                    <img id="img-gifts" class="image-how-it-works" src="../assets/images/schedule.png" alt="Schedule" />
                    <h2 class="centered">Adjust subscription</h2>
                    <p class="centered">Visit your subscriptions page to adjust schedule or cancel items if needed.</p>
                </div>

            </div>
        </section>
        <section class='section maxw1035 rounded-corner card'>
            <h2 class="center extra-large-font uppercase primary-color">Meals & Recipes</h2><br>

            <div class="three-col-grid grid-gap-1-em">

                <div class="p-relative">
                    <a href="/school/recipe?r=egusi"> <img width="500px" src="../assets/images/egusi.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=egusi">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Egusi Soup</span></h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=ata"> <img width="500px" src="../assets/images/ata.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=ata">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Ata Dindin</h2>
                    </a>

                </div>

                <div class="p-relative">

                    <a href="/school/recipe?r=chix"><img width="500px" src="../assets/images/chix.jpeg"></a>


                    <a class="p-title" href="/school/recipe?r=chix">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Chicken Stew</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=jollof"><img width="500px" src="../assets/images/jollof.webp"></a>

                    <a class="p-title" href="/school/recipe?r=jollof">
                        <h2 class="title-style"><span class="title-style-span">Party Jollof Rice</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=psoup"><img width="500px" src="../assets/images/psoup.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=psoup">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Pepper Soup</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=okra"><img width="500px" src="../assets/images/okra.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=okra">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Okra Soup</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=oilless"><img width="500px" src="../assets/images/oilless.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=oilless">
                        <h2 class="title-style"><span class="title-style-span">Oilless Okra Soup</h2>
                    </a>

                </div>

                <div class="p-relative">
                    <a href="/school/recipe?r=sbeef"><img width="500px" src="../assets/images/suya.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=sbeef">
                        <h2 class="title-style"><span class="title-style-span">Nigerian Suya Beef</h2>
                    </a>
                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=hbp"><img width="500px" src="../assets/images/honey.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=hbp">
                        <h2 class="title-style"><span class="title-style-span">Honey Beans Porridge</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=abb"><img width="500px" src="../assets/images/abbs.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=abb">
                        <h2 class="title-style"><span class="title-style-span">African Black Beans Stew</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=fufu"><img width="500px" src="../assets/images/fufu.webp"></a>

                    <a class="p-title" href="/school/recipe?r=fufu">
                        <h2 class="title-style"><span class="title-style-span">Cassava Fufu</h2>
                    </a>

                </div>
                <div class="p-relative">
                    <a href="/school/recipe?r=sorrel"><img width="500px" src="../assets/images/sorrel.jpeg"></a>

                    <a class="p-title" href="/school/recipe?r=sorrel">
                        <h2 class="title-style"><span class="title-style-span">Sobo Drink</h2>
                    </a>

                </div>

            </div>

            <br>
            <section class="section margin-top-4-em">
                <h2 class="center extra-large-font uppercase primary-color">What We Ship You</h2><br>


            </section>

            @include('includes.mealkit')

    

            <h2 class="center font-size-3-em primary-color">Choose schedule & subscribe!</h2><br>

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
                    <option value="2">${{ $price }} - Every 2 months</option>
                    <option value="3">${{ $price }} - Every 3 months</option>
                    <option value="0">${{ $price }} - One-time purchase</option>
                </select>

            </form>
            <button data-quantity="1" data-name="African Mealkit by Jemimah" data-plan="1" data-img="sisi.jpeg"
                data-id="65" data-baseprice="{{ $price }}" data-price="{{ $price }}" class="cart-add button center">SUBSCRIBE NOW</button>
                
                <section class="section">
                    <h2 class="center primary-color extra-large-font uppercase">Meal-kit Author</h2>
                    <img class="center maxw300px" src="../assets/images/sisi.jpeg">
                    <h4 class="centered extra-large-font">Hi, I'm Jemimah Adebiyi, the mealkit author.<br>
                        Thanks for stopping by!</h4>
                </section>

        </section>



    </main>


@endsection
