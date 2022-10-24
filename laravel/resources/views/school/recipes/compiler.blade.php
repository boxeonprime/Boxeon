
@extends('layouts.index')

@section('title', $content->title)
@section('og:image',  asset('../assets/images/products/' . $content->img))
@section('og:image:alt',  asset('../assets/images/products/medium/' . $content->img)) 
@section('keywords',  $meta->keywords)
@section('description',  $meta->blurb)
@push('script')
<script defer src="https://apis.google.com/js/platform.js"></script>
<script defer type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63371544b22a350012c877a6&product=inline-share-buttons" defer></script>

@endpush
@section('content')
    <main>
@include("school.recipes.recipe")
    </main>
@endsection
