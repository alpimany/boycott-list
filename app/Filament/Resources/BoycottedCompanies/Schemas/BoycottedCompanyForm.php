<?php

namespace App\Filament\Resources\BoycottedCompanies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BoycottedCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('الإسم')
                    ->required(),
                FileUpload::make('image')
                    ->label('الصورة')
                    ->image()
                    ->required(),
                TextInput::make('location')
                    ->label('الموقع')
                    ->required(),
                RichEditor::make('description')
                    ->label('الوصف')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
