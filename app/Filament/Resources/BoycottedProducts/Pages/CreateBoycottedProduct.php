<?php

namespace App\Filament\Resources\BoycottedProducts\Pages;

use App\Filament\Resources\BoycottedProducts\BoycottedProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBoycottedProduct extends CreateRecord
{
    protected static string $resource = BoycottedProductResource::class;
}
