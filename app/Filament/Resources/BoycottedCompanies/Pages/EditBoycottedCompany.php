<?php

namespace App\Filament\Resources\BoycottedCompanies\Pages;

use App\Filament\Resources\BoycottedCompanies\BoycottedCompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBoycottedCompany extends EditRecord
{
    protected static string $resource = BoycottedCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
