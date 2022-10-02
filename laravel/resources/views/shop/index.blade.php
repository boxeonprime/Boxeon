@extends('layouts.home')
@section('title', 'Shop African & Caribbean Foods | Boxeon')
@section('og:image',  asset('../assets/images/logo_square.png'))
@section('og:image:alt',  asset('../assets/images/logo_square2.png')) 
@section('keywords',  "Boxeon, African Subscription Box, African Snack Box, Food Delivery Service, Snack Delivery Service, Nigerian Cuisine, Caribbean Foods, African Food Recipes")
@section('description',  "Boxeon is an African food and meal kit delivery service helping the diaspora automate and repatriate their grocery shopping. We specialize in African and Caribbean foods and deliver nationwide. Get 16 free foods - this offer ends soon.")
@section('content')
@include("includes.shop-products")
@endsection
