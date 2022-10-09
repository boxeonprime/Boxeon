@component('mail::message')
    # <h2>Welcome to {{ config('app.name') }}!</h2>

    <p>And welcome to the Home In A Box Movement. You have successfully created a Boxeon account. We're glad to have you,
        {{ $user->given_name }}!</p>

    <p>Please reach out if you need help.</p>

    <h2>About Boxeon</h2>

    <p>We started Boxeon to make it simple for the diaspora to enjoy the
        foods they love from home. But we quickly learned that Boxeon is much more than that. </p>

    <p>If you've ever had problems with time management and stress; if you've ever worried about
        the rampant carcinogenics in Western foods; if you've ever wished to experience more of
        your home culture; we're here for you.</p>
    <p>We're here for anyone and everyone who wants to consume from back home but
        whose time is valuable.</p>

    <p>We're a service for diasporans with busy lives to automate and repatriate their grocery shopping.
        We believe that a culture of "work abroad, but consume from home" will
        one day spark industrial revolutions in our home countries. That's what Boxeon is about.</p>


    Thank you,<br>
    The {{ config('app.name') }} Team<br>
    244 5th Avenue, Suite 7,<br>
    New York, NY 10001<br>
    service@boxeon.com<br>
    646.450.4670‬<br>
@endcomponent
