<?php

namespace App\Filament\Resources\BoycottedCompanies;

use App\Filament\Resources\BoycottedCompanies\Pages\CreateBoycottedCompany;
use App\Filament\Resources\BoycottedCompanies\Pages\EditBoycottedCompany;
use App\Filament\Resources\BoycottedCompanies\Pages\ListBoycottedCompanies;
use App\Filament\Resources\BoycottedCompanies\Schemas\BoycottedCompanyForm;
use App\Filament\Resources\BoycottedCompanies\Tables\BoycottedCompaniesTable;
use App\Models\BoycottedCompany;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BoycottedCompanyResource extends Resource
{
    protected static ?string $model = BoycottedCompany::class;
    protected static ?string $modelLabel = 'شركة';
    protected static ?string $pluralModelLabel = 'الشركات';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingStorefront;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BoycottedCompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BoycottedCompaniesTable::configure($table);
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
            'index' => ListBoycottedCompanies::route('/'),
            'create' => CreateBoycottedCompany::route('/create'),
            'edit' => EditBoycottedCompany::route('/{record}/edit'),
        ];
    }
}
