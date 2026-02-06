<?php

declare(strict_types=1);

namespace App\Filament\Resources\TicketPrices\Pages;

use App\Filament\Resources\TicketPrices\TicketPriceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTicketPrice extends EditRecord
{
    protected static string $resource = TicketPriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
