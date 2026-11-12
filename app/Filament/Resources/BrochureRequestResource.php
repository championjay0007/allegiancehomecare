<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrochureRequestResource\Pages;
use App\Models\BrochureRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\BrochureDownload;
use App\Mail\PricingScheduleDownload;

class BrochureRequestResource extends Resource
{
    protected static ?string $model = BrochureRequest::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Marketing';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Request Information')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')->required()->maxLength(255),
                        Forms\Components\TextInput::make('last_name')->required()->maxLength(255),
                        Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                        Forms\Components\TextInput::make('phone')->tel()->required()->maxLength(20),
                        Forms\Components\Toggle::make('contact_me')->label('Contact Requested'),
                        Forms\Components\Toggle::make('email_sent'),
                        Forms\Components\Select::make('pricing_type')
                            ->options([
                                'ndis' => 'NDIS Pricing',
                                'homecare' => 'Homecare Pricing',
                            ])
                            ->nullable(),
                        Forms\Components\TextInput::make('brochure_path')
                            ->label('Brochure Path')
                            ->hint(fn ($state) => $state && Storage::disk('public')->exists($state) 
                                ? 'Available' 
                                : 'Not available'),
                        Forms\Components\TextInput::make('ndis_pricing_path')
                            ->label('NDIS Pricing Path')
                            ->hint(fn ($state) => $state && Storage::disk('public')->exists($state) 
                                ? 'Available' 
                                : 'Not available'),
                        Forms\Components\TextInput::make('pricing_schedule_path')
                            ->label('Homecare Pricing Path')
                            ->hint(fn ($state) => $state && Storage::disk('public')->exists($state) 
                                ? 'Available' 
                                : 'Not available'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\IconColumn::make('contact_me')
                    ->label('Contact')
                    ->boolean(),
                Tables\Columns\IconColumn::make('email_sent')
                    ->label('Sent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('pricing_type')
                    ->label('Pricing Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ndis' => 'info',
                        'homecare' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'ndis' => 'NDIS',
                        'homecare' => 'Homecare',
                        default => 'None',
                    }),
                Tables\Columns\IconColumn::make('brochure_path')
                    ->label('Brochure')
                    ->icon(fn ($state) => $state ? 'heroicon-o-document-check' : 'heroicon-o-x-circle')
                    ->color(fn ($state) => $state && Storage::disk('public')->exists($state) ? 'success' : 'danger'),
                Tables\Columns\IconColumn::make('ndis_pricing_path')
                    ->label('NDIS')
                    ->icon(fn ($state) => $state ? 'heroicon-o-currency-dollar' : 'heroicon-o-x-circle')
                    ->color(fn ($state) => $state && Storage::disk('public')->exists($state) ? 'success' : 'danger'),
                Tables\Columns\IconColumn::make('pricing_schedule_path')
                    ->label('Homecare')
                    ->icon(fn ($state) => $state ? 'heroicon-o-home' : 'heroicon-o-x-circle')
                    ->color(fn ($state) => $state && Storage::disk('public')->exists($state) ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pricing_type')
                    ->options([
                        'ndis' => 'NDIS',
                        'homecare' => 'Homecare',
                    ]),
                Tables\Filters\SelectFilter::make('document_status')
                    ->options([
                        'brochure_available' => 'Brochure Available',
                        'ndis_available' => 'NDIS Pricing Available',
                        'homecare_available' => 'Homecare Pricing Available',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if ($data['value'] === 'brochure_available') {
                            return $query->whereNotNull('brochure_path');
                        }
                        if ($data['value'] === 'ndis_available') {
                            return $query->whereNotNull('ndis_pricing_path');
                        }
                        if ($data['value'] === 'homecare_available') {
                            return $query->whereNotNull('pricing_schedule_path');
                        }
                        return $query;
                    }),
                Tables\Filters\Filter::make('contact_requested')
                    ->query(fn (Builder $query): Builder => $query->where('contact_me', true))
                    ->label('Contact Requested'),
            ])
            ->actions([
                Tables\Actions\Action::make('send_available_documents')
                    ->icon('heroicon-o-paper-airplane')
                    ->label('Send Available')
                    ->action(function (BrochureRequest $record) {
                        try {
                            $brochureAvailable = $record->brochure_path && Storage::disk('public')->exists($record->brochure_path);
                            $ndisAvailable = $record->ndis_pricing_path && Storage::disk('public')->exists($record->ndis_pricing_path);
                            $homecareAvailable = $record->pricing_schedule_path && Storage::disk('public')->exists($record->pricing_schedule_path);
                            
                            if (!$brochureAvailable && !$ndisAvailable && !$homecareAvailable) {
                                throw new \Exception('No documents available to send');
                            }

                            if ($brochureAvailable) {
                                Mail::to($record->email)->queue(new BrochureDownload(
                                    $record->first_name,
                                    $record->last_name,
                                    $record->brochure_path
                                ));
                            }

                            if ($ndisAvailable || $homecareAvailable) {
                                $pricingPath = $ndisAvailable ? $record->ndis_pricing_path : $record->pricing_schedule_path;
                                $pricingType = $ndisAvailable ? 'ndis' : 'homecare';
                                
                                Mail::to($record->email)->queue(new PricingScheduleDownload(
                                    $record->first_name,
                                    $record->last_name,
                                    $pricingPath,
                                    $pricingType
                                ));
                            }
                            
                            $record->update(['email_sent' => true]);
                            
                            $documentsSent = [];
                            if ($brochureAvailable) $documentsSent[] = 'Brochure';
                            if ($ndisAvailable) $documentsSent[] = 'NDIS Pricing';
                            if ($homecareAvailable) $documentsSent[] = 'Homecare Pricing';
                            
                            Notification::make()
                                ->title(count($documentsSent) . ' document(s) sent')
                                ->body(implode(' and ', $documentsSent) . ' sent successfully')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Failed to send documents')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->hidden(fn (BrochureRequest $record) => 
                        !$record->brochure_path && !$record->ndis_pricing_path && !$record->pricing_schedule_path),
                
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrochureRequests::route('/'),
            'create' => Pages\CreateBrochureRequest::route('/create'),
            'view' => Pages\ViewBrochureRequest::route('/{record}'),
            'edit' => Pages\EditBrochureRequest::route('/{record}/edit'),
        ];
    }
}