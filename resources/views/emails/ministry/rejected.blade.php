<x-mail::message>
# {{ __('Ministry Team Application Update') }}

{{ __('Dear') }} {{ $registration->first_name }},

{{ __('Thank you for your interest in serving at Europe Revival 2026.') }}

{{ __('After careful consideration, we regret to inform you that we are unable to approve your ministry team application at this time.') }}

@if($reason)
<x-mail::panel>
**{{ __('Reason') }}:**

{{ $reason }}
</x-mail::panel>
@endif

{{ __('We still encourage you to attend the conference as a participant. You can register as an attendee at our website.') }}

{{ __('If you have any questions or would like to discuss this further, please do not hesitate to contact us.') }}

{{ __('Thanks') }},<br>
{{ config('app.name') }}
</x-mail::message>
