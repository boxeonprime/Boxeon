@extends('layouts.index')
@section('title', 'NYC Meal kit Delivery Service | Boxeon')
@section('og:image', asset('../assets/images/logo-square.webp'))
@section('og:image:alt', asset('../assets/images/logo-square2.webp'))
@section('keywords', 'Boxeon, NYC Meal Kit Delivery Service')
@section('description',
    'Boxeon is the God of delivering meal kits straight to your NYC doorstep. Boxeon\'s chefs do the
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

        <section class='section maxw1035'>

            <section class="section margin-top-4-em wide four-col-grid grid-gap-4-em">
                <span></span>
                <img src={{ asset('../assets/images/placeholder-large.webp') }} alt="Inside Box">
                <div class="w-max-content">
                    <h2 class="font-size-3-em text-black">What's inside each box?</h2>

                    <p>✓ Easy-to-follow recipes with clear nutritional info</p>
                    <p>✓ High-quality ingredients sourced straight from the farm</p>
                    <p>✓ Convenient meal kits that fit perfectly in the fridge</p>
                    <p>✓ A fun cooking experience that makes you feel unstoppable</p>
                    <p>✓ Innovative packaging designed to reduce waste</p>

                    <button class="view-plans button w100per">VIEW OUR PLANS</button>
                </div>

                <span></span>
            </section>
            
            <section class="section margin-top-4-em wide three-col-grid">
                <span></span>
                <div>
                    <h2 class="centered font-size-3-em">Over 30+ fresh recipes every week</h2>
                    <p class="centered"> Easy meals designed by professional chefs and nutritionists</p>
                    <div class="three-col-grid align-items-center">
                        <span><img id="prev-slide" src={{ asset('../assets/images/prev-arrow.svg') }} alt="Previous"></span>
                        <ul class="slide">
                            <li>
                                <div class="p-relative ">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Meat & Veggie</h3>
                                            <p class="bg-red padding-2-per text-black">Our most popular plan</p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="p-relative ">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Veggie</h3>
                                            <p class="bg-green padding-2-per text-black">& plant-base meals</p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="p-relative ">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Fit & Wholesome</h3>
                                            <p class="bg-gold padding-2-per text-black">For a balanced lifestyle</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="p-relative">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Family Friendly</h3>
                                            <p class="bg-orange padding-2-per text-black">Kids-tested recipes</p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="p-relative">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Exotic</h3>
                                            <p class="bg-green padding-2-per text-black">Uncommon meals</p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="p-relative ">

                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies">

                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Pescatarian</h3>
                                            <p class="bg-blue padding-2-per text-black">Seafood & veggie meals</p>
                                        </div>
                                    </div>

                                </div>
                            </li>

                        </ul>
                        <span><img id="next-slide" src={{ asset('../assets/images/prev-arrow.svg') }}
                                alt="Inside Box"></span>
                    </div>

                    <a href="/menus" class="button clearbtn margin-auto">VIEW OUR MENUS</a>
                </div>

                <span></span>
            </section>
            <section class="section margin-top-4-em wide grid-gap-4-em four-col-grid">
                <span></span>
                <img src={{ asset('../assets/images/placeholder-large.webp') }} alt="Inside Box">

                <div>
                    <h2 class="font-size-3-em">Get 16 Free Foods + 3 Surprise Gifts</h2>
                    <p>Follow us on Instagram @boxeonNYC
                    <p>
                        <button class="view-plans button clearbtn">VIEW OUR PLANS</button>
                </div>

                <span></span>
            </section>
        </section>
        <section id="banner" class="margin-top-4-em wide padding-2-per white three-row-grid three-col-grid">
            <span></span>

            <div class="centered-banner-content">
                <h2 class="centered font-size-3-em">Flexible Plans</h2>
                <p class="centered">to meet your household's needs
                <p>
                    <button class="view-plans margin-auto button">VIEW OUR PLANS</button>
            </div>

            <span></span>
        </section>

        @include("includes.faqs")

    </main>


@endsection
