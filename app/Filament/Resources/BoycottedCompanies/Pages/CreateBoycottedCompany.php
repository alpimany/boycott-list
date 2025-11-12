<?php

namespace App\Filament\Resources\BoycottedCompanies\Pages;

use App\Filament\Resources\BoycottedCompanies\BoycottedCompanyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBoycottedCompany extends CreateRecord
{
    protected static string $resource = BoycottedCompanyResource::class;
}
