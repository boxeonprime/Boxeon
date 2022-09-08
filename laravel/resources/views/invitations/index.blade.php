@extends('layouts.index')
@section('title', 'Boxeon.com Give Someone You Love A Taste Of Africa')
@section('content')
    <div id="masthead">
        <aside class="centered asides call-out mobile-scroll"><br>
            <h2 id="headline_h1" class="font-size-3-em">Give Someone You Love A Taste Of Home</h2>
            <p class="centered center font-1-5-em">Home in a box. Subscribe to monthly deliveries of your favorite foods from
                home
                to save time and money. Cancel anytime.</p><br>
            <a href="#whatis" class="button uppercase">GET STARTED</a>
        </aside>
        <br><br>
    </div>
    <main> <a id='whatis' href='#whatis'></a>
        @include('includes.works')
        
        @include('includes.gifts')
        
        <section id="creators-bar" class="max-width-1035 section  mobile-scroll display-none">
            <div class="center div-horizontal-rule"></div>
            <h2 class="centered primary-color">BEST SELLERS</h2>
            <div id="as-seen-on" class="four-col-grid">
                @php
                    $sellers = DB::table('products')
                        ->where('category', '=', 'Snack')
                        ->take(4)
                        ->get();
                    
                @endphp
                @for ($i = 0; $i < count($sellers); $i++)
                    <div>
                        <a href="/shop/item?id={{ $sellers[$i]->id }}">
                            <img class="maxw200px" src="../assets/images/products/{{ $sellers[$i]->img }}"></a>
                        <a class="" href="/shop/item?id={{ $sellers[$i]->id }}">
                            <p>{{ $sellers[$i]->name }}</p>
                        </a>
                    </div>
                @endfor
            </div>
        </section>
    </main>
@endsection
