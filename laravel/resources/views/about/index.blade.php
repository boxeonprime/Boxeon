@extends('layouts.about')
@section('title', 'About Boxeon And Our Values')
@section('og:image', asset('../assets/images/logo_square.png'))
@section('og:image:alt', asset('../assets/images/logo_square2.png'))
@section('keywords', 'Boxeon, NYC, Meal Kit Delivery Service')
@section('description',
    'Boxeon is a New York City local meal kit delivery service started by restaurant workers for
    restaurant workers.')
@section('content')
    <div id="masthead" class="grid-two-rows">
        <aside class="asides margin-left-10-per call-out mobile-scroll">
            <br>
            <div class="white text-align-left">
                <p class="uppercase neon-green">Our mission</p>
                <h1 class="font-size-2-em green">We change the way New Yorkers experience food</h1>

            </div>
        </aside>
        <div class="four-col-grid grid-gap-4-em margin-left-10-per maxw1035">
            <div>
                <h3 class="neon-green">Budget</h3>
                <p class="white">Helping consumers to save money with every meal</p>
            </div>
            <div>
                <h3 class="neon-green">Freshness</h3>
                <p class="white">Democratizing access to high-quality food</p>
            </div>
            <div>
                <h3 class="neon-green">Taste</h3>
                <p class="white">Allowing everyone to enjoy a varied and tasty diet</p>
            </div>
            <div>
                <h3 class="neon-green">Sustainability</h3>
                <p class="white">Less food waste, C02 neutral delivery of every box</p>
            </div>
        </div>
    </div>
    <main id="about" class="white">
        <section class="section margin-top-4-em wide grid-gap-4-em four-col-grid">
            <span></span>
            <img src={{ asset('../assets/images/placeholder-large.webp') }} alt="Inside Box">
            <div>
                <h2>Our business model</h2>
                <p>Follow us on Instagram @boxeonNYC
                <p>
                    <button class="view-plans button clearbtn">VIEW OUR PLANS</button>
            </div>
            <span></span>
        </section>
        <section id="banner" class="section margin-top-4-em wide four-col-grid">
            <span></span>
            <div>
                <h2>The Kitchen</h2>
                <p>999 Atlantic Ave, Brooklyn, NY 11238</p>
                <p>https://cookcollectivekitchen.com/</p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.715696078962!2d-73.9591725!3d40.6802328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b987e9c1ff3%3A0x5834352186d2b577!2s999%20Atlantic%20Ave%2C%20Brooklyn%2C%20NY%2011238!5e0!3m2!1sen!2sus!4v1670272473418!5m2!1sen!2sus"
                width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
                <span></span>
        </section>
        <section class="section margin-top-4-em wide grid-gap-4-em four-col-grid">
            <span></span>
            <img src={{ asset('../assets/images/placeholder-large.webp') }} alt="Inside Box">
            <div>
                <h2>Our business model</h2>
                <p>Follow us on Instagram @boxeonNYC
                <p>
                    <button class="view-plans button clearbtn">VIEW OUR PLANS</button>
            </div>
            <span></span>
        </section>
    </main>
@endsection
