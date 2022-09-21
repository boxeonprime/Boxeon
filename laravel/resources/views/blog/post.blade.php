@extends('layouts.index')
@section('title', 'Boxeon.com Blog')
@section('content')
    <main>
        <section class="section card maxw1035">
            @include('includes.category-nav')
            <a href="#">
                <h1 class="center extra-large-font maxw800px primary-color">Where to get spices or ingredients for Nigerian or West African dishes?</h1>
            </a>
            <br>
            <a class="center" href="/blog/post/"> <img class="center maxw800px" src='{{ asset('../assets/images/placeholder.webp')}}' /></a>


        </section>

    </main>

@endsection
