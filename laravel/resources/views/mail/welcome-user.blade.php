@component('mail::message')

# <h2>Welcome to {{ config('app.name') }}!</h2>



 <p>You have successfully created a Boxeon account. We're glad to have you!</p>
 <p>Please reach out to us if you have any concerns.</p>


Thanks you,<br>
The {{ config('app.name') }} Team
@endcomponent
