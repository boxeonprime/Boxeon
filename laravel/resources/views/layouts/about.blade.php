
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
</head>

<body id='index' class="neon-green-bg">
    <div id="container" class="bg-black">
        <span></span><!-- Hack-->
        @include('includes.header')
        @include('includes.menus.index')
        @yield('content')
    </div>
    @include('includes.footer')
</body>

</html>
