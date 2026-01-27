@php
    $livewire = $getLivewire();
    $data = $livewire->data ?? [];
    $ticketType = $data['ticket_type'] ?? 'individual';
    $quantity = (int) ($data['ticket_quantity'] ?? 1);
    $pricePerTicket = $ticketType === 'individual' ? 49 : 39;
    $total = $pricePerTicket * $quantity;
@endphp

<div class="space-y-3">
    <div class="flex justify-between text-sm text-white/70">
        <span>{{ ucfirst($ticketType) }} Ticket x {{ $quantity }}</span>
        <span>{{ number_format($total, 2) }}</span>
    </div>
    <div class="border-t border-stone-700 pt-3 flex justify-between text-lg font-bold text-white">
        <span>Total</span>
        <span class="text-amber-400">{{ number_format($total, 2) }}</span>
    </div>
</div>
