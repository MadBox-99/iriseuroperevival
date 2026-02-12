@php
    use App\Services\StripeService;

    $livewire = $getLivewire();
    $data = $livewire->data ?? [];
    $ticketType = $data['ticket_type'] ?? 'individual';
    $quantity = (int) ($data['ticket_quantity'] ?? 1);

    $stripeService = app(StripeService::class);
    $tier = $stripeService->getCurrentPricingTier();
    $tierName = $stripeService->getTierName();
    $pricePerTicket = $stripeService->getTicketPrice($ticketType, $tier);
    $individualPrice = $stripeService->getTicketPrice('individual', $tier);
    $total = $pricePerTicket * $quantity;

    $ticketLabel = match ($ticketType) {
        'individual' => 'Standard Ticket',
        'team' => 'Group Pass',
        'vip' => 'VIP Pass',
        default => 'Ticket',
    };
@endphp

<div class="space-y-4">
    {{-- Pricing Tier Badge --}}
    <div class="flex items-center gap-2">
        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
            @if($tier === 'early') bg-green-500/20 text-green-400
            @elseif($tier === 'regular') bg-blue-500/20 text-blue-400
            @else bg-amber-500/20 text-amber-400
            @endif">
            {{ $tierName }} Pricing
        </span>
        @if($tier === 'early')
            <span class="text-xs text-white/50">Ends {{ $stripeService->getEarlyBirdEndDate() }}</span>
        @endif
    </div>

    {{-- Line Items --}}
    <div class="space-y-2">
        <div class="flex justify-between text-sm text-white/60">
            <span>{{ $ticketLabel }} x {{ $quantity }}</span>
            @if($ticketType === 'team')
                <span>
                    <span class="line-through text-white/40">€{{ number_format($individualPrice / 100, 2) }}</span>
                    €{{ number_format($pricePerTicket / 100, 2) }} each
                </span>
            @else
                <span>€{{ number_format($pricePerTicket / 100, 2) }} each</span>
            @endif
        </div>

        @if($ticketType === 'team')
            <div class="flex justify-between text-sm text-green-400">
                <span>Group Discount (20% off)</span>
                <span>-€{{ number_format(($individualPrice - $pricePerTicket) * $quantity / 100, 2) }}</span>
            </div>
        @endif

        @if($ticketType === 'vip')
            <div class="text-xs text-white/50 mt-2">
                Includes: Front row seating, VIP lounge access, speaker meet & greet, exclusive merchandise
            </div>
        @endif
    </div>

    {{-- Total --}}
    <div class="border-t border-navy-600 pt-3 flex justify-between text-lg font-bold">
        <span class="text-primary-400">Total</span>
        <span class="text-primary-400">€{{ number_format($total / 100, 2) }}</span>
    </div>

    {{-- Team Warning --}}
    @if($ticketType === 'team' && $quantity < 10)
        <div class="text-sm text-amber-400 flex items-center gap-2">
            <x-heroicon-o-exclamation-triangle class="h-4 w-4" />
            <span>Minimum 10 tickets required for group pass</span>
        </div>
    @endif
</div>
