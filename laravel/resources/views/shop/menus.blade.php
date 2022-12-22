<!DOCTYPE html>
@extends('layouts.home')
<title>Weekly Menus | Boxeon</title>
@section('og:image', asset('../assets/images/{{ $product[0]->img }}'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords', 'Boxeon, NYC Meal Kit Delivery Service')
@section('description',
    'NYC Meal Kit Delivery Service. Get 16 free meals and 3 surprise gifts when you order today plus
    a discount on your first box.')
@section('content')
    @if (session()->has('message'))
        <dialog class="alert">
            <p class='centered'> {{ session()->get('message') }}</p>
        </dialog>
    @endif
    <main>
        <section class="card maxw1035 section rounded-corners">
            <h1 class="centered font-size-3-em margin-bottom-zero">Menu for Dec 10 - 16</h1>
            <div id="menu-dates" class="six-col-grid">
                <div class="border-right-zero">
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
                <div class="border-right-zero">
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
                <div class="border-right-zero">
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
                <div class="border-right-zero">
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
                <div class="border-right-zero">
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
                <div>
                    <p class="margin-bottom-zero">Dec</p>
                    <p class="margin-top-zero">10-16</p>
                </div>
            </div>

            <section class="section margin-top-4-em wide three-col-grid">
                <span></span>
                <div>
                    <div class="three-col-grid align-items-center">
                        <span></span>
                        <ul class="slide">
                            <li>
                                <div class="p-relative ">
                                    <img width="262px" height="367px" src="../assets/images/placeholder-small.webp"
                                        loading="lazy" alt="Meat & Veggies" class="rounded-corners">
                                    <div class="bg-black-gradient">
                                        <div>
                                            <h3 class="title-style">Meat & Veggie</h3>
                                            <p class="bg-red padding-2-per text-black">Our most popular plan</p>
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
                        <span></span>
                    </div>
                </div>
                <span></span>
            </section>
            <div id="blogs-stream" class='two-col-grid'>
                <div>

                    <a href="/blog/post/"> <img class="maxw600px"
                            src='{{ asset('../assets/images//placeholder-small.webp') }}' /></a>
                    <a href="#">
                        <h1 class="extra-large-font maxw600px primary-color">Where to get spices or ingredients for Nigerian
                            or West African dishes?</h1>
                    </a>
                    <p class="maxw600px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore
                        et
                        dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea
                        commodo consequat.</p>

                </div>

                <div>
                    <a href="#"> <img class="w100per" src="../assets/images//placeholder-small.webp" /></a>

                    <a href="#">
                        <h2 class="primary-color">Lorem ipsum dolor sit amet</h2>
                    </a>
                    <div class="div-horizontal-rule"></div>
                </div>

            </div>

            <br>
            <hr>
            <h2 class="extra-large-font uppercase">Afro Fusion</h2>
            <hr>

            <div class="three-col-grid">
                <a href="#"> <img class="maxw200px" src="../assets/images//placeholder-small.webp" /></a>
                <a href="#">
                    <h2 class="primary-color">Where to get spices or ingredients for Nigerian or West African dishes?</h2>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea
                    commodo consequat.</p>

            </div>
            <div class="div-horizontal-rule"></div>



            <h2 class="extra-large-font uppercase">Health</h2>


            <div class="three-col-grid">
                <div>
                    <a href="#"> <img class="maxw300px" src="../assets/images//placeholder-small.webp" /></a>
                    <a href="#">
                        <h2 class="primary-color">Charities our subscriptions support</h2>
                    </a>
                </div>
                <div>
                    <a href="#"> <img class="maxw300px" src="../assets/images//placeholder-small.webp" /></a>
                    <a href="#">
                        <h2 class="primary-color">Charities our subscriptions support</h2>
                    </a>
                </div>
                <div>
                    <a href="#"> <img class="maxw300px" src="../assets/images//placeholder-small.webp" /></a>
                    <a href="#">
                        <h2 class="primary-color">Charities our subscriptions support</h2>
                    </a>
                </div>
            </div>
        </section>
        </section>
        </section>
    </main>
@endsection
