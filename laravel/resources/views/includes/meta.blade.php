@php
header('Accept-Encoding: gzip, compress, br');
@endphp
<title>@yield('title', config('app.name'))</title>
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="@yield('og:image')">
<meta property="og:image:alt" content="@yield('og:image:alt')">
<meta property="og:image:size" content="320" />
<meta property="og:locale" content="en-us" />
<meta property="og:locale:alternate" content="en-ca" />
<meta property="og:site_name" content="{{config('app.name')}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:site" content="@boxeonofficial" />
<meta name="keywords" content="@yield('keywords')">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" type="image/svg+xml" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="alternate icon" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="mask-icon" href="https://boxeon.com/images/favicon.webp" color="#fff">
<link rel="stylesheet" href="{{ asset('../assets/css/style.min.css?v=37') }}">
<link rel="stylesheet" href="{{ asset('../assets/css/forms.min.css?v=35') }}">
<link defer rel="stylesheet" href="{{ asset('../css/app.css') }}">
<link rel="stylesheet" media="screen and (min-width: 200px) and (max-width: 1810px)"
    href="{{ asset('../assets/css/mobile.min.css?v=3.6') }}" />
<script defer type="module" src="{{ asset('../assets/js/global.js?v=2.1') }}"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63371544b22a350012c877a6&product=inline-share-buttons" defer></script>

