<?php

declare(strict_types=1);

namespace App\Filament\Resources\TicketPrices\Pages;

use App\Filament\Resources\TicketPrices\TicketPriceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTicketPrice extends CreateRecord
{
    protected static string $resource = TicketPriceResource::class;
}
