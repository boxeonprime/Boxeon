@php
header('Accept-Encoding: gzip, compress, br');

@endphp
<title>@yield('title', config('app.name'))</title>
<meta property="og:title" content="Boxeon.com Monthly African Food Subscription Box" />
<meta property="og:description" content="African store online, Shop African food online, African snacks" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://boxeon.com" />
<meta property="og:image" content="{{ asset('../assets/images/high-five.jpg') }}">
<meta name="description"
    content="Boxeon makes it easy for the African diapora to buy African foods from home. Shop West African foods and snacks." />
<meta name="keywords" content="Boxeon, buy black, subscription box, African foods, Nigerian Foods, Jollof Rice, Fufu">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" type="image/svg+xml" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="alternate icon" href="{{ asset('../assets/images/favicon.webp') }}">
<link rel="mask-icon" href="https://boxeon.com/images/favicon.webp" color="#fff">
<link rel="stylesheet" href="{{ asset('../assets/css/style.css?v=37') }}">
<link rel="stylesheet" href="{{ asset('../assets/css/forms.css?v=35') }}">
<link defer rel="stylesheet" href="{{ asset('../css/app.css') }}">
<link rel="stylesheet" media="screen and (min-width: 200px) and (max-width: 1810px)"
    href="{{ asset('../assets/css/mobile.css?v=3.6') }}" />
<script defer type="module" src="{{ asset('../assets/js/global.js?v=2.1') }}"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63371544b22a350012c877a6&product=inline-share-buttons" defer></script>

