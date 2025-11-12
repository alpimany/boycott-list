<?php

namespace App\Filament\Resources\BoycottedProducts;

use App\Filament\Resources\BoycottedProducts\Pages\CreateBoycottedProduct;
use App\Filament\Resources\BoycottedProducts\Pages\EditBoycottedProduct;
use App\Filament\Resources\BoycottedProducts\Pages\ListBoycottedProducts;
use App\Filament\Resources\BoycottedProducts\Schemas\BoycottedProductForm;
use App\Filament\Resources\BoycottedProducts\Tables\BoycottedProductsTable;
use App\Models\BoycottedProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BoycottedProductResource extends Resource
{
    protected static ?string $model = BoycottedProduct::class;
    protected static ?string $modelLabel = 'منتج';
    protected static ?string $pluralModelLabel = 'المنتجات';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShoppingBag;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BoycottedProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BoycottedProductsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBoycottedProducts::route('/'),
            'create' => CreateBoycottedProduct::route('/create'),
            'edit' => EditBoycottedProduct::route('/{record}/edit'),
        ];
    }
}
