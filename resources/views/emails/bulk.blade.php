<x-mail::message>
# Hello {{ $registration->first_name }},

{!! nl2br(e($body)) !!}

<x-mail::button :url="config('app.url')">
Visit Europe Revival 2026
</x-mail::button>

Blessings,<br>
{{ config('app.name') }} Team
</x-mail::message>
