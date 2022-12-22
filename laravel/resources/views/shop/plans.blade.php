@extends('layouts.virgin')
@section('title', 'Order Your Delicious Mealkit | Boxeon')
@section('og:image', asset('../assets/images/logo_square.png'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords', 'Boxeon, NYC Meal Kit Delivery Service')
@section('description',
    'Boxeon is a New York City meal kit delivery service helping New Yorkers cook dinner or
    breakfast in 15 minutes or less. Get 16 free meals and 3 surprise gifts when you order today.')
@section('content')
    <section class='section card maxw1036'>
        <h1 class="centered font-size-3-em">Personalize your plan</h1>
        <div id="plan-options-grid" class="three-col-grid">
            <div>
                <h2 class="centered">1. Choose your preferences</h2>
                <p class="centered text-sm">Your preferences will help us show you the most relevant recipes first. You'll
                    still have
                    access to all
                    recipes each week.</p>
                    <p id="warning" class="centered text-red">Please make a selection</p>
                <section class="two-col-grid plan-options-grid">

                    <div class="plan-option" data-type-name="Meat & Veggies">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto" src="{{ asset('../assets/images/kebab.svg') }}"
                            alt="Meat">
                        <p>Meat & Veggies</p>
                    </div>
                    <div class="plan-option" data-type-name="Veggies">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto"
                            src="{{ asset('../assets/images/apple.svg') }}" alt="Veggies">

                        <p>Veggies</p>
                    </div>
                    <div class="plan-option" data-type-name="Body Builder">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto"
                            src="{{ asset('../assets/images/body.png') }}" alt="Sports">

                        <p>Body Builder</p>
                    </div>
                    <div class="plan-option" data-type-name="Family Friendly">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto"
                            src="{{ asset('../assets/images/family.svg') }}" alt="Family">

                        <p>Family Friendly</p>
                    </div>
                    <div class="plan-option" data-type-name="Breakfast">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto"
                            src="{{ asset('../assets/images/breakfast.svg') }}" alt="Breakfast">

                        <p>Breakfast</p>
                    </div>
                    <div class="plan-option" data-type-name="Pescatarian">
                        <img class="l-float check-circle" width="30px" height="30px" src="{{ asset('../assets/images/check-circle-green.png') }}" alt="Checked">
                        <img class="margin-auto" width="30px" height="auto"
                            src="{{ asset('../assets/images/fish.svg') }}" alt="Fish">

                        <p>Pescatarian</p>
                    </div>
                </section>
            </div>
            <div class="div-vertical-rule-dashed"></div>
            <section>
                <h2 class="centered"> 2. Customize your plan size</h2>

                <div class="two-col-grid">
                    <p>Number of people</p>
                    <div class="people-options two-col-grid">
                        <p  data-type-people="2" class="plan-people border-right-zero">2</p>
                        <p  class="plan-people" data-type-people="4">4</p>
                    </div>
                </div>
                <div class="two-col-grid">
                    <p>Recipes per week</p>
                    <div class="people-options five-col-grid">
                        <p data-type-recipes="2" class="plan-recipes border-right-zero">2</p>
                        <p data-type-recipes="3" class="plan-recipes border-right-zero"><span class="relative-position">
                            <img id="super" width="16px" height="16px"
                            src="{{ asset('../assets/images/fav.webp') }}" alt="Heart">    
                        </span>3</p>
                        <p data-type-recipes="4" class="plan-recipes border-right-zero">4</p>
                        <p data-type-recipes="5" class="plan-recipes border-right-zero">5</p>
                        <p data-type-recipes="6"  class="plan-recipes">6</p>
                    </div>
                </div>
                <div>
                    <div class="two-col-grid">
                        <div>
                            <b><h3>Veggies</h3></b>
                            <p> 3 meals for 2 people per week</p>
                            <p>6 total servings</p>
                        </div>
                        <p class="most-popular">
                            <span><img width="16px" height="16px"
                                src="{{ asset('../assets/images/fav.svg') }}" alt="Heart"></span> &nbsp;Most popular</p>
                    </div>
                    <div class="two-col-grid box-total">
                        <div>
                            <p>Box price</p>
                            <p>Price per serving</p>
                        </div>
                        <div>
                        <p>$59.94</p>
                        <p>$4.69</p>
                        </div>
                    </div>
                    <div class="two-col-grid plan-total">
                        <div>
                            <p>First box total</p>
                        </div>
                        <div>
                        <p class="discount">$42.79 off</p>
                        <h2>$28.14</h2>
                        </div>
                    </div>
                </div>
                <br>
            </section>
        </div>
        <button id="select-plan" data-recipes="2" data-name="" data-people="2" data-img="/logo-square.webp" data-price="" class="cart-add button center">SELECT THIS PLAN</button>

    </section>

@endsection
