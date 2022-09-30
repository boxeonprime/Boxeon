@extends('layouts.index')
@section('title', 'Boxeon.com African Food Blog')
@section('content')
    <main>
        <section class="section card maxw1035">
            @include('includes.category-nav')
            <div id="blogs-stream" class='two-col-grid'>
                <div>

                    <a href="/blog/post/"> <img class="maxw600px" src='{{ asset('../assets/images/placeholder.webp')}}' /></a>
                    <a href="#">
                        <h1 class="extra-large-font maxw600px primary-color">Where to get spices or ingredients for Nigerian or West African dishes?</h1>
                    </a>
                    <p class="maxw600px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea
                        commodo consequat.</p>

                </div>

                <div>
                    <a href="#"> <img class="w100per" src="../assets/images/placeholder.webp" /></a>

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
                <a href="#"> <img class="maxw200px" src="../assets/images/placeholder.webp" /></a>
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
                <a href="#"> <img class="maxw300px" src="../assets/images/placeholder.webp" /></a>
                <a href="#">
                    <h2 class="primary-color">Charities our subscriptions support</h2>
                </a>
                </div>
            <div>
                <a href="#"> <img class="maxw300px" src="../assets/images/placeholder.webp" /></a>
                <a href="#">
                    <h2 class="primary-color">Charities our subscriptions support</h2>
                </a>
            </div>
            <div>
                <a href="#"> <img class="maxw300px" src="../assets/images/placeholder.webp" /></a>
                <a href="#">
                    <h2 class="primary-color">Charities our subscriptions support</h2>
                </a>
            </div>
            </div>

            <div class="div-horizontal-rule"></div>

        </section>

    </main>

@endsection
