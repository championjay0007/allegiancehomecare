<?php

namespace App\Filament\Resources;

use App\Models\PageSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Filament\Resources\PageSectionResource\Pages;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('layout_type')
                    ->options([
                        'hero' => 'Hero Section',
                        'features' => 'Features Section',
                        'cta' => 'Call to Action',
                    ])
                    ->required(),

                Forms\Components\Text::make('title')
                    ->nullable(),

                Forms\Components\Textarea::make('content')
                    ->json()
                    ->columnSpan('full'),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Visible')
                    ->default(true),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table // Fixed type-hint here
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('layout_type'),
            ])
            ->defaultSort('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSections::route('/'),
            'create' => Pages\CreatePageSection::route('/create'),
            'edit' => Pages\EditPageSection::route('/{record}/edit'),
        ];
    }
}
