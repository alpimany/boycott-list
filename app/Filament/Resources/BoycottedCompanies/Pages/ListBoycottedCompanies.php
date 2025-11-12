<?php

namespace App\Filament\Resources\BoycottedCompanies\Pages;

use App\Filament\Resources\BoycottedCompanies\BoycottedCompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBoycottedCompanies extends ListRecords
{
    protected static string $resource = BoycottedCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
