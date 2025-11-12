<?php

namespace App\Filament\Resources\BoycottedProducts\Pages;

use App\Filament\Resources\BoycottedProducts\BoycottedProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBoycottedProducts extends ListRecords
{
    protected static string $resource = BoycottedProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
