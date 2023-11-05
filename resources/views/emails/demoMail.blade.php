@component('mail::message')
# {{ $mailData['name'] }}
# {{ $mailData['email'] }}
# {{ $mailData['phone'] }}
# {{ $mailData['message'] }}
  
The body of your message.
  
@component('mail::button', ['url' => $mailData['url']])
Visit Our Website
@endcomponent
  
Thanks,

{{ config('app.name') }}
@endcomponent