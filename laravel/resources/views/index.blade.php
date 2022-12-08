@extends('layouts.index')
@section('title', 'NYC Meal kit Delivery Service | Boxeon')
@section('og:image', asset('../assets/images/logo-square.webp'))
@section('og:image:alt', asset('../assets/images/logo-square2.webp'))
@section('keywords', 'Boxeon, NYC Meal Kit Delivery Service')
@section('description', 'Boxeon is the God of delivering meal kits straight to your NYC doorstep. Boxeon\'s chefs do the
    prep work, like peeling, chopping & marinating, so you can cook a fresh homemade dinner in just 15 minutes.')
@section('content')
    <div id="mealkit-masthead">
        <aside class="centered asides call-out mobile-scroll">
            <br>
            <img class="center" src="{{ asset('../assets/images/logo-black.webp') }}" alt="Boxeon">
            <h1 id="headline_h1" class="font-size-3-em">Cook dinner in <br>15-minutes or less</h1>
            <p class="centered center font-1-5-em">Boxeon's chefs do the prep work, like peeling, chopping & marinating, so
                you can cook a fresh homemade dinner in just 15 minutes.
            </p><br>

            <button class="view-plans" class="button">VIEW OUR PLANS</button>

        </aside>
        <br>
    </div>
    <main>

        @include('includes.works')

        <section class='section maxw1035 rounded-corner card'>
            <h2 class="center centered font-size-3-em uppercase primary-color">Pick Your Meals</h2>
            <p class="centered">Pick the meals you want to enjoy in your meal kit by clicking the plus (+) sign.</p>


            @include('includes.recipes-stream')


            <h2 class="center centered font-size-3-em uppercase primary-color">Pick Your Drinks</h2>
            <p class="centered">Delight yourselves with these creative and tasty Caribbean and West African drinks.</p>

            <div class="recipes-stream margin-bottom-4-em">

                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Sea Moss Smoothie</h2>

                    </div>
                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Hibiscus Cocktail</h2>


                    </div>

                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="Nigerian Chicken Stew">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Aromatic Ice Tea</h2>

                    </div>

                </div>
            </div>

            <h2 class="center centered font-size-3-em uppercase primary-color">Pick Your Desserts</h2>
            <p class="centered">Top your meals off with one or all of these rich delights.</p>
            <div class="recipes-stream margin-bottom-4-em">

                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Savory Bean Pudding</h2>

                    </div>

                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Banana Foster</h2>

                    </div>

                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="Nigerian Chicken Stew">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Artisan Mousse</h2>

                    </div>

                </div>
            </div>

            <h2 class="center centered font-size-3-em uppercase primary-color">Pick 16 Free Meals</h2>
            <p class="centered">Top your meals off with one or all of these rich delights.</p>
            <div class="recipes-stream margin-bottom-4-em">

                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Savory Bean Pudding</h2>

                    </div>

                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img
                            src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Banana Foster</h2>

                    </div>

                </div>
                <div class="p-relative menu-image-wrapper">
                    <span class="add-meal"><img
                            src="{{ asset('../assets/images/add-circle.svg') }}"alt="Add"></span>
                    <img width="320px" height="466px" src="../assets/images/products/medium/placeholder.webp"
                        loading="lazy" alt="Nigerian Chicken Stew">

                    <div class="bg-black-gradient">
                        <h2 class="title-style">Artisan Mousse</h2>

                    </div>

                </div>
            </div>

            <section class="section margin-top-4-em">
             
                <button class="view-plans" class="button">VIEW OUR PLANS</button>
               
            </section>
        </section>

    </main>


@endsection
