<x-mail::message>
# {{ __('Order Confirmation') }}

{{ __('Thank you for your order') }}

{{ __('Dear') }} {{ $order->customer_name }},

{{ __('We have received your order and it is being processed.') }}

<x-mail::panel>
**{{ __('Order Details') }}**

**{{ __('Order Reference') }}:** {{ $order->uuid }}
**{{ __('Order Date') }}:** {{ $order->created_at->format('F j, Y') }}
</x-mail::panel>

<x-mail::table>
| {{ __('Product') }} | {{ __('Quantity') }} | {{ __('Price') }} |
|:-------------|:-------:|--------:|
@foreach($order->items as $item)
| {{ $item->product_name }} | {{ $item->quantity }} | {{ number_format($item->total / 100, 2) }} € |
@endforeach
</x-mail::table>

<x-mail::panel>
**{{ __('Subtotal') }}:** {{ number_format($order->subtotal / 100, 2) }} €
@if($order->discount > 0)
**{{ __('Discount') }}:** -{{ number_format($order->discount / 100, 2) }} €
@endif
**{{ __('Total') }}:** {{ $order->formatted_total }}
</x-mail::panel>

<x-mail::button :url="$url">
{{ __('View Order Details') }}
</x-mail::button>

{{ __('Thanks') }},<br>
{{ config('app.name') }}
</x-mail::message>
