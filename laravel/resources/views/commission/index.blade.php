@extends('layouts.index')
@section('title', 'Boxeon | Commission')
@section('content')

    <div id="masthead">
        <section id="headline">
            <p class="text-heading-label">GO FISHING AND</p>
            <h1 class="ginormous">Catch a lower commission on your sales</h1>
            <p id="pitch"> We take 14% from the revenue generated by creators not
                in the Partner Program, but you can catch
                a commission as low as 5% by inviting creators you know to Boxeon.</p>
            <a class="button" href="/invitations/home"> Get started </a>
            <a href="#whatis" class="button clearbtn hide"> Learn more </a>
        </section>
        <div id="masthead-image-commission"> </div>
    </div>

    <main> <a id='whatis' href='#whatis'></a>
        <aside class="asides">
            <h1 class="extra-large-font darkblue">How it works</h1>
            <p class="center font-1-5-em"><a href='/invitations/home'>Get started</a> by inviting creators with your invitation link. We'll automatically credit your account
                once they make their first sale. Read on for more info.</p>
        </aside>
        <section class="section">
            <div class="alt-section-inner-grid">
                <div class="secinner">
                    <p><span class="highlighted">11%</span> commission</p>
                    <p>Get <b>three</b> creators to become sellers and we'll drop the commission we charge you down to eleven percent.</p>
                </div>
                <img src="../assets/images/makeitrain.svg" alt="subscription box">
            </div>
        </section>
        <section class="section">
            <div class="section-inner-grid"> <img src="../assets/images/rewards.svg" alt="subscription box wallet">
                <div class="secinner">
                    <p><span class="highlighted">8%</span> commission</p>
                    <p>Get <b>six</b> total creators to become sellers and we'll slash our commission for you down to eight percent.</p>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="alt-section-inner-grid large-margin-bottom">
                <div class="secinner">
                    <p><span class="highlighted">5%</span> commission</p>
                    <p>Finally, get a total of <b>nine</b> creators to become sellers and we'll drop our commission for you to a measly five percent.</p>
                </div>
                <img src="../assets/images/printing.svg" alt="subscription box">
            </div>
        </section>
     
        <section class="section"> <br>
            <div class="centered margin-bottom-10-em">
              <h1 class="extra-large-font darkblue">It's that simple</h1>
              <br>
              <a class="button" href="/invitations/home"> Get started </a> </div>
          </section>
        
    </main>


@endsection