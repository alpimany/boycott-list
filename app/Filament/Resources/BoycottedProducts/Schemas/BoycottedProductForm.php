<?php

namespace App\Filament\Resources\BoycottedProducts\Schemas;

use App\Models\AlternativeProduct;
use App\Models\BoycottedCompany;
use App\Models\BoycottedProduct;
use App\Models\BoycottedProductKeyword;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BoycottedProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('description')
                    ->required(),
                Select::make('alternatives')
                    ->label("Alternatives")
                    ->relationship(name: 'replacements', titleAttribute: 'name')
                    ->searchable()
                    ->multiple()
                    ->getSearchResultsUsing(fn (string $search): array => AlternativeProduct::query()
                            ->whereLike('name', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->all())
                    ->getOptionLabelsUsing(fn (array $values): array => AlternativeProduct::query()
                        ->whereIn('id', $values)
                        ->pluck('name', 'id')
                        ->all())
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ]),
                Select::make('boycotted_company_id')
                    ->label("Company")
                    ->required()
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search): array => BoycottedCompany::query()
                            ->whereLike('name', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->all())
                    ->getOptionLabelUsing(fn ($value): ?string => BoycottedCompany::find($value)?->name),
                Repeater::make('keywords')
                    ->label('الكلمات الدلالية')
                    ->relationship()
                    ->schema([
                        TextInput::make('label')->label('الكلمة')->required(),
                    ]),
            ]);
    }
}
