@php
    $livewire = $getLivewire();
    $data = $livewire->data ?? [];
    $type = $livewire->type ?? 'attendee';
    $firstName = $data['first_name'] ?? '';
    $lastName = $data['last_name'] ?? '';
    $email = $data['email'] ?? '';
    $city = $data['city'] ?? '';
    $country = $data['country'] ?? '';
    $ticketType = $data['ticket_type'] ?? 'individual';
    $ticketQuantity = (int) ($data['ticket_quantity'] ?? 1);
    $pricePerTicket = $ticketType === 'individual' ? 49 : 39;
    $total = $pricePerTicket * $ticketQuantity;
@endphp

<dl class="space-y-3">
    <div class="flex justify-between">
        <dt class="text-white/60">Name</dt>
        <dd class="text-white font-medium">{{ $firstName }} {{ $lastName }}</dd>
    </div>
    <div class="flex justify-between">
        <dt class="text-white/60">Email</dt>
        <dd class="text-white font-medium">{{ $email }}</dd>
    </div>
    <div class="flex justify-between">
        <dt class="text-white/60">Location</dt>
        <dd class="text-white font-medium">{{ $city }}, {{ $country }}</dd>
    </div>
    @if($type === 'attendee')
        <div class="border-t border-stone-700 pt-3 flex justify-between">
            <dt class="text-white/60">Tickets</dt>
            <dd class="text-white font-medium">{{ $ticketQuantity }}x {{ ucfirst($ticketType) }}</dd>
        </div>
        <div class="flex justify-between text-lg font-bold">
            <dt class="text-white">Total</dt>
            <dd class="text-amber-400">{{ number_format($total, 2) }}</dd>
        </div>
    @endif
</dl>
