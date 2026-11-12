<?php

namespace App\Filament\Resources;
use App\Filament\Resources\FeedbackComplaintResource\Pages;
use App\Models\FeedbackComplaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class FeedbackComplaintResource extends Resource
{
    protected static ?string $model = FeedbackComplaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Support';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->nullable()
                    ->label('Name (Optional)'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->nullable()
                    ->label('Email (Optional)'),

                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('category')
                    ->options([
                        'NDIS' => 'NDIS',
                        'Home Care' => 'Home Care',
                    ])
                    ->required(),

                Forms\Components\Toggle::make('anonymous')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('display_name')
                    ->label('Name')
                    ->getStateUsing(fn ($record) => $record->anonymous ? 'Anonymous' : ($record->name ?? 'N/A')),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'NDIS' => 'success',
                        'Home Care' => 'primary',
                        default => 'gray'
                    }),

                Tables\Columns\IconColumn::make('anonymous')
                    ->boolean()
                    ->label('Submitted Anonymously'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'NDIS' => 'NDIS',
                        'Home Care' => 'Home Care',
                    ]),
                Tables\Filters\TernaryFilter::make('anonymous'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(), // Add delete action here
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Add bulk delete action
                ]),
            ]);
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
            'index' => Pages\ListFeedbackComplaints::route('/'),
            'view' => Pages\ViewFeedbackComplaint::route('/{record}'),
        ];
    }
}