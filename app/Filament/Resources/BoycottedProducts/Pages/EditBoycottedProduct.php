<?php

namespace App\Filament\Resources\BoycottedProducts\Pages;

use App\Filament\Resources\BoycottedProducts\BoycottedProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBoycottedProduct extends EditRecord
{
    protected static string $resource = BoycottedProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
