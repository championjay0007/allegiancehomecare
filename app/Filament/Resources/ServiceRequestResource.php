<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceRequestResource\Pages;
use App\Filament\Resources\ServiceRequestResource\RelationManagers;
use App\Models\ServiceRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceRequestResponse;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Service Requests';
    protected static ?string $modelLabel = 'Service Request';
    protected static ?string $slug = 'service-requests';

    public static function form(Form $form): Form
    {
        $ndisServices = [
            'support_worker' => 'Support Worker',
            'plan_management' => 'Plan Management',
            'therapeutic_support' => 'Therapeutic Support',
            'equipment' => 'Equipment',
            'home_modification' => 'Home Modification',
            'transport' => 'Transport',
            'community_participation' => 'Community Participation',
        ];

        $hcpServices = [
            'personal_care' => 'Personal Care',
            'nursing_care' => 'Nursing Care',
            'allied_health' => 'Allied Health',
            'meal_preparation' => 'Meal Preparation',
            'domestic_assistance' => 'Domestic Assistance',
            'social_support' => 'Social Support',
        ];

        return $form
            ->schema([
                Forms\Components\Section::make('Service Information')
                    ->schema([
                        Forms\Components\Select::make('service_type')
                            ->options([
                                'ndis' => 'NDIS',
                                'home_care' => 'Home Care Package',
                            ])
                            ->required(),
                        Forms\Components\Select::make('completing_as')
                            ->options([
                                'participant' => 'Participant',
                                'family' => 'Family Member',
                                'coordinator' => 'Coordinator',
                                'other' => 'Other',
                            ])
                            ->required()
                            ->live(),
                        Forms\Components\TextInput::make('other_role')
                            ->visible(fn (Forms\Get $get) => $get('completing_as') === 'other'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Personal Details')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('postcode')
                            ->required()
                            ->maxLength(10),
                        Forms\Components\TextInput::make('suburb')
                            ->maxLength(100),
                        Forms\Components\Select::make('state')
                            ->options([
                                'ACT' => 'ACT',
                                'NSW' => 'NSW',
                                'NT' => 'NT',
                                'QLD' => 'QLD',
                                'SA' => 'SA',
                                'TAS' => 'TAS',
                                'VIC' => 'VIC',
                                'WA' => 'WA',
                            ]),
                        Forms\Components\TextInput::make('ndis_number')
                            ->visible(fn (Forms\Get $get) => $get('service_type') === 'ndis'),
                        Forms\Components\TextInput::make('hcp_id')
                            ->label('Aged Care ID')
                            ->visible(fn (Forms\Get $get) => $get('service_type') === 'home_care'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Contact Preferences')
                    ->schema([
                        Forms\Components\Checkbox::make('contact_phone')
                            ->label('Phone'),
                        Forms\Components\Checkbox::make('contact_email')
                            ->label('Email'),
                        Forms\Components\Checkbox::make('contact_sms')
                            ->label('SMS'),
                        Forms\Components\Select::make('contact_time')
                            ->options([
                                'morning' => 'Morning',
                                'afternoon' => 'Afternoon',
                                'evening' => 'Evening',
                                'anytime' => 'Anytime',
                            ]),
                    ])->columns(2),
                
                Forms\Components\Section::make('Service Needs')
                    ->schema([
                        Forms\Components\DatePicker::make('preferred_date'),
                        Forms\Components\CheckboxList::make('ndis_services')
                            ->options($ndisServices)
                            ->visible(fn (Forms\Get $get) => $get('service_type') === 'ndis')
                            ->columns(2),
                        Forms\Components\CheckboxList::make('hcp_services')
                            ->options($hcpServices)
                            ->visible(fn (Forms\Get $get) => $get('service_type') === 'home_care')
                            ->columns(2),
                        Forms\Components\Textarea::make('additional_info')
                            ->maxLength(1000),
                        Forms\Components\FileUpload::make('support_docs')
                            ->multiple()
                            ->downloadable()
                            ->directory('service-request-docs'),
                        Forms\Components\Select::make('referral_source')
                            ->options([
                                'search' => 'Search Engine',
                                'social' => 'Social Media',
                                'friend' => 'Friend/Family',
                                'healthcare' => 'Healthcare Professional',
                                'other' => 'Other',
                            ]),
                        Forms\Components\Checkbox::make('consent')
                            ->label('I consent to the collection of this information')
                            ->required(),
                    ]),
                
                Forms\Components\Section::make('Response')
                    ->schema([
                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Internal Notes')
                            ->maxLength(1000),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'ndis' => 'NDIS',
                        'home_care' => 'Home Care',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'ndis' => 'info',
                        'home_care' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('completing_as')
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('m/d/Y g:i A')
                    ->sortable(),
                Tables\Columns\IconColumn::make('responded')
                    ->label('Responded')
                    ->boolean()
                    ->getStateUsing(fn ($record) => !empty($record->admin_notes)),
                Tables\Columns\IconColumn::make('contact_phone')->boolean()->label('Phone'),
                Tables\Columns\IconColumn::make('contact_email')->boolean()->label('Email'),
                Tables\Columns\IconColumn::make('consent')->boolean()->label('Consent'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('service_type')
                    ->options([
                        'ndis' => 'NDIS',
                        'home_care' => 'Home Care Package',
                    ]),
                Tables\Filters\SelectFilter::make('completing_as')
                    ->options([
                        'participant' => 'Participant',
                        'family' => 'Family Member',
                        'coordinator' => 'Coordinator',
                        'other' => 'Other',
                    ]),
                Tables\Filters\Filter::make('responded')
                    ->query(fn ($query) => $query->whereNotNull('admin_notes'))
                    ->label('Responded Only'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('respond')
                    ->label('Respond')
                    ->icon('heroicon-o-envelope')
                    ->form([
                        Forms\Components\Textarea::make('response')
                            ->label('Response Message')
                            ->required(),
                        Forms\Components\Toggle::make('send_copy_to_admin')
                            ->label('Send copy to admin')
                            ->default(true),
                    ])
                    ->action(function (ServiceRequest $record, array $data) {
                        // Send email to requester
                        Mail::to($record->email)->send(new ServiceRequestResponse($record, $data['response']));
                        
                        if ($data['send_copy_to_admin']) {
                            // Send copy to admin
                            Mail::to(config('mail.from.address'))
                                ->send(new ServiceRequestResponse($record, $data['response'], true));
                        }
                        
                        // Update record
                        $record->update(['admin_notes' => $data['response']]);
                        
                        Notification::make()
                            ->title('Response sent successfully')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('respondToAll')
                        ->label('Respond to Selected')
                        ->icon('heroicon-o-envelope')
                        ->form([
                            Forms\Components\Textarea::make('response')
                                ->label('Response Message')
                                ->required(),
                            Forms\Components\Toggle::make('send_copy_to_admin')
                                ->label('Send copy to admin')
                                ->default(true),
                        ])
                        ->action(function (iterable $records, array $data) {
                            foreach ($records as $record) {
                                // Send email to requester
                                Mail::to($record->email)->send(new ServiceRequestResponse($record, $data['response']));
                                
                                if ($data['send_copy_to_admin']) {
                                    // Send copy to admin
                                    Mail::to(config('mail.from.address'))
                                        ->send(new ServiceRequestResponse($record, $data['response'], true));
                                }
                                
                                // Update record
                                $record->update(['admin_notes' => $data['response']]);
                            }
                            
                            Notification::make()
                                ->title('Responses sent to ' . count($records) . ' requests')
                                ->success()
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceRequests::route('/'),
            'create' => Pages\CreateServiceRequest::route('/create'),
            'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
            'view' => Pages\ViewServiceRequest::route('/{record}'),
        ];
    }
}