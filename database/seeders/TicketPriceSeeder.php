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
            ['ticket_type' => 'individual', 'pricing_tier' => 'regular', 'price' => 5900, 'label' => 'Standard Ticket', 'sort_order' => 2],
            ['ticket_type' => 'individual', 'pricing_tier' => 'late', 'price' => 6900, 'label' => 'Standard Ticket', 'sort_order' => 3],
            ['ticket_type' => 'team', 'pricing_tier' => 'early', 'price' => 3900, 'label' => 'Group Pass', 'sort_order' => 4],
            ['ticket_type' => 'team', 'pricing_tier' => 'regular', 'price' => 4900, 'label' => 'Group Pass', 'sort_order' => 5],
            ['ticket_type' => 'team', 'pricing_tier' => 'late', 'price' => 5900, 'label' => 'Group Pass', 'sort_order' => 6],
            ['ticket_type' => 'volunteer', 'pricing_tier' => 'early', 'price' => 2900, 'label' => 'Volunteer Pass', 'sort_order' => 7],
            ['ticket_type' => 'volunteer', 'pricing_tier' => 'regular', 'price' => 3900, 'label' => 'Volunteer Pass', 'sort_order' => 8],
            ['ticket_type' => 'volunteer', 'pricing_tier' => 'late', 'price' => 4900, 'label' => 'Volunteer Pass', 'sort_order' => 9],
            ['ticket_type' => 'vip', 'pricing_tier' => 'early', 'price' => 14900, 'label' => 'VIP Pass', 'sort_order' => 10],
            ['ticket_type' => 'vip', 'pricing_tier' => 'regular', 'price' => 17900, 'label' => 'VIP Pass', 'sort_order' => 11],
            ['ticket_type' => 'vip', 'pricing_tier' => 'late', 'price' => 19900, 'label' => 'VIP Pass', 'sort_order' => 12],
        ];

        foreach ($prices as $price) {
            TicketPrice::query()->updateOrCreate(
                ['ticket_type' => $price['ticket_type'], 'pricing_tier' => $price['pricing_tier']],
                $price,
            );
        }
    }
}
