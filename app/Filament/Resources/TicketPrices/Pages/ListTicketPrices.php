<?php

declare(strict_types=1);

namespace App\Filament\Resources\TicketPrices\Pages;

use App\Filament\Resources\TicketPrices\TicketPriceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTicketPrices extends ListRecords
{
    protected static string $resource = TicketPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
