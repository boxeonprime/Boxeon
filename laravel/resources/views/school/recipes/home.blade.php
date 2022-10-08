@php

$price = DB::table('products')
    ->whereIn('products.id', [47, 10, 8, 36, 9, 4, 48, 14, 26, 7, 41, 38, 66, 67, 53])
    ->sum('price');

@endphp

@extends('layouts.index')
@section('title', 'African Recipes And Food Delivery | Boxeon')
@section('og:image', asset('../assets/images/logo_square.png'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords', 'Boxeon, African Subscription Box, African Snack Box, Nigerian Cuisine, Caribbean Foods, African
    Food Recipes')
@section('description', 'Boxeon is an African food and meal kit delivery service helping the diaspora automate and
    repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free
    foods - this offer ends soon.')
@section('content')

    <main>

        <section class='section maxw1035 rounded-corner card'>
       
            @include('includes.recipes-stream')

        </section>

    </main>


@endsection
