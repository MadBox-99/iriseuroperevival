<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\TicketPrice;
use Illuminate\Database\Seeder;

class TicketPriceSeeder extends Seeder
{
    /**
     * Seed the 12 ticket price combinations (3 tiers × 4 types).
     */
    public function run(): void
    {
        $prices = [
            ['ticket_type' => 'individual', 'pricing_tier' => 'early', 'price' => 4900, 'label' => 'Standard Ticket', 'sort_order' => 1],
            ['ticket_type' => 'individual', 'pricing_tier' => 'regular', 'price' => 6900, 'label' => 'Standard Ticket', 'sort_order' => 2],
            ['ticket_type' => 'team', 'pricing_tier' => 'early', 'price' => 3900, 'label' => 'Group Pass', 'sort_order' => 3],
            ['ticket_type' => 'team', 'pricing_tier' => 'regular', 'price' => 5900, 'label' => 'Group Pass', 'sort_order' => 4],
            ['ticket_type' => 'volunteer', 'pricing_tier' => 'early', 'price' => 2900, 'label' => 'Volunteer Pass', 'sort_order' => 5],
            ['ticket_type' => 'volunteer', 'pricing_tier' => 'regular', 'price' => 3900, 'label' => 'Volunteer Pass', 'sort_order' => 6],
        ];

        // Remove deprecated tiers
        TicketPrice::query()
            ->whereIn('pricing_tier', ['late'])
            ->orWhereIn('ticket_type', ['vip'])
            ->delete();

        foreach ($prices as $price) {
            TicketPrice::query()->updateOrCreate(
                ['ticket_type' => $price['ticket_type'], 'pricing_tier' => $price['pricing_tier']],
                $price,
            );
        }
    }
}
