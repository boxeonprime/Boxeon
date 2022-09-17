@extends('layouts.checkout')
@section('title', 'Boxeon.com Referal Program')


@section('content')

    <main id="checkout-main">
        <span></span>
        <div id="refpro">
            <section id="checkout-content" class="margin-top-6-em max-width-1035 three-rows-grid">
                <div class="step-wrapper">
                    <h1 class="centered primary-color uppercase">Order Placed</h1>
                    <p class="centered">Please check your email address for further information. Or visit your <a href="/home/index" class="primary-color underline one-em-font">subscriptions page</a>.</p>
                    <h2 class="centered black-font">{{$user->given_name}}, get up to $90 in store credit by <br>inviting your friends to Boxeon!</h2>
                    <p class="centered center font-size-1-5-em">For every friend that makes a purchase on Boxeon, we'll give you both $10.00 store credit.</p>
                    <div>
                        <div class="div-horizontal-rule center"></div>
                        <h2 class="centered center text-red">You have 9 of 9 invites remaining</h2>
                      <br>
                        <form action='/checkout/address' method='post'>
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-75">
                                    <label class="centered black-font center font-size-1-5-em">Invite a friend by email</label>
                                   
                                   <input class="margin-auto centered" name="" type="email" placeholder="Add friend's email">
                                   <input class="center margin-auto"  type='submit' value='INVITE FRIEND'>

                                </div>
                            </div>
                           
                        </form>
                        <div class="div-horizontal-rule center"></div>
                        <h3 class="centered black-font center font-size-1-5-em">More ways to invite friends</h3>
                        <br>
                        <form>
                            <label class="centered black-font center font-size-1-5-em">Copy and share link 
                            <input class='clipboard centered center w300px' type='text' value='https://boxeon.com/{{$user->id}}/accept'>
                        </label>
                        </form>
                    </div>
                    <div></div>
                </div>
            </section>
        </div>
        <div>
        </div>
        </div>
        </section>
        </div>
    </main>
@endsection
