@component('mail::message')

Hi {{$user->given_name}}!

You have sucessfully submitted your order.  

We're processcing your order and will keep you posted.

Please save our email in your address book to ensure our 
communications don't end up in your spam folder.



Sincerely,<br>
- The {{ config('app.name') }} Team
@endcomponent
