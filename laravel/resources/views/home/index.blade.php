@extends('layouts.home')
@section('title', 'Boxeon.com Manage Subscriptions')
@section('content')

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
@endsection
