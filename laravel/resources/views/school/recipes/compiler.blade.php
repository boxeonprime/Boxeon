
@extends('layouts.index')
@section('title', $content->title)
@section('og:image',  asset('../assets/images/products/' . $content->img))
@section('og:image:alt',  asset('../assets/images/products/medium/' . $content->img)) 
@section('keywords',  $meta->keywords)
@section('description',  $meta->blurb)
@section('content')
    <main>
@include("school.recipes.recipe")
    </main>
@endsection
