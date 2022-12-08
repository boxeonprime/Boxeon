<!DOCTYPE html>
@extends('layouts.home')
<title>Get 16 Free Meals + 3 Surprise Gifts | Official Boxeon Website</title>
@section('og:image',  asset('../assets/images/{{ $product[0]->img }}'))
@section('og:image:alt',  asset('../assets/images/logo_square2.png')) 
@section('keywords',  "Boxeon, NYC Meal Kit Delivery Service")
@section('description',  "NYC Meal Kit Delivery Service. Get 16 free meals and 3 surprise gifts when you order today plus a discount on your first box.")
@section('content')
    @if (session()->has('message'))
        <dialog class="alert">
            <p class='centered'> {{ session()->get('message') }}</p>
        </dialog>
    @endif
    <div id="masthead" class="promo-masthead">
        <aside class="asides call-out mobile-scroll">
            <br>
            <img class="center" src="{{asset("../assets/images/logo-black.webp")}}" alt="Boxeon">
            <h1 id="headline_h1">Get 16 free meals<br>+ 3 surprise gifts</h1>
            <p class="centered center font-1-5-em">Claim offer with your first subscription 
                to our 15-minute reliable meal kits for
                the best dishes your favorite NYC
                restaurant offers.</p>
            <br>
        
            <button class="view-plans" class="button">VIEW OUR PLANS</button>
    </div>
    <main>
        <section class="card maxw1035 section">
          
        </section>
    </main>
@endsection
