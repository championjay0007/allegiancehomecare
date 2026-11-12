<?php

namespace App\Filament\Resources;

use App\Models\Contact;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use App\Mail\ContactResponseMail;
use App\Filament\Resources\ContactResource\Pages;

// Import table columns
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

// Import form components
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;
    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Contact Messages';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20),
                        
                        Textarea::make('message')
                            ->required()
                            ->rows(5)
                            ->columnSpan('full'),
                        
                        Select::make('status')
                            ->options([
                                'new' => 'New',
                                'read' => 'Read',
                                'responded' => 'Responded',
                            ])
                            ->default('new'),
                        
                        Textarea::make('admin_notes')
                            ->label('Admin Notes')
                            ->columnSpan('full')
                            ->helperText('Internal notes for this contact'),
                        
                        Textarea::make('admin_response')
                            ->label('Response to User')
                            ->columnSpan('full')
                            ->helperText('This will be emailed to the user'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                
                TextColumn::make('email')
                    ->searchable(),
                
                TextColumn::make('phone'),
                
                BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'new',
                        'success' => 'read',
                        'warning' => 'responded',
                    ])
                    ->icons([
                        'heroicon-o-bell' => 'new',
                        'heroicon-o-eye' => 'read',
                        'heroicon-o-check' => 'responded',
                    ]),
                
                TextColumn::make('admin_response')
                    ->label('Response Sent')
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),
                
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
                Tables\Actions\Action::make('sendResponse')
                    ->label('Send Response')
                    ->icon('heroicon-o-envelope')
                    ->action(function (Contact $record, array $data) {
                        $response = $data['admin_response'] ?? '';

                        if (!empty($response)) {
                            Mail::to($record->email)->send(new ContactResponseMail($record, $response));
                        }

                        $record->update([
                            'admin_response' => $response,
                            'status' => 'responded'
                        ]);

                        Notification::make()
                            ->title('Response Sent')
                            ->success()
                            ->send();
                    })
                    ->form([
                        Textarea::make('admin_response')
                            ->label('Response Message')
                            ->default(fn(Contact $record): ?string => $record->admin_response)
                            ->required(),
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}