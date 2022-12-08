<!DOCTYPE html>
@extends('layouts.home')
<title>Weekly Menus | Boxeon</title>
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
    <main>
        <section class="card maxw1035 section">
            <h1 class="centered font-size-3-em">Menu for Dec 10 - 16</h1>
          
            <div id="menu-dates" class="six-col-grid">
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
                <div>
                    <p>Dec</p>
                    <p>10-16</p>
                </div>
            </div>
          
        </section>
    </main>
@endsection
