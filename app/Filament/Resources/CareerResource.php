<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Mail\CareerInfoRequest;
use App\Mail\CareerInterviewInvitation;
use App\Mail\CareerRejection;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function getModelLabel(): string
    {
        return 'Job Application';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Job Applications';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('Applicant Information')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('first_name')->required(),
                        TextInput::make('last_name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('phone'),
                        Select::make('job_position')
                            ->options(array_combine(Career::ROLES, Career::ROLES)),
                        Select::make('referral_source')
                            ->options(array_combine(Career::REFERRAL_SOURCES, Career::REFERRAL_SOURCES)),
                    ]),
                ])
                ->collapsible(),

            Section::make('Application Preferences')
                ->schema([
                    Grid::make(2)->schema([
                        Select::make('preferred_location')
                            ->options(array_combine(Career::LOCATIONS, Career::LOCATIONS)),
                        Select::make('employment_type_preference')
                            ->options(array_combine(Career::EMPLOYMENT_TYPES, Career::EMPLOYMENT_TYPES)),
                        Select::make('work_rights')
                            ->options(array_combine(Career::WORK_RIGHTS_OPTIONS, Career::WORK_RIGHTS_OPTIONS)),
                        Select::make('availability')
                            ->options(array_combine(Career::AVAILABILITIES, Career::AVAILABILITIES)),
                        Toggle::make('consent')
                            ->disabled(),
                        Textarea::make('cover_letter')
                            ->label('Cover Note / Message')
                            ->columnSpanFull(),
                    ]),
                ])
                ->collapsible(),

            Section::make('Legacy Eligibility and References')
                ->schema([
                    Grid::make(2)->schema([
                        Toggle::make('is_australian_citizen_or_pr')
                            ->label('Australian Citizen or PR?')
                            ->reactive(),
                        Toggle::make('has_valid_working_visa')
                            ->label('Valid Working Visa?')
                            ->hidden(fn (callable $get) => $get('is_australian_citizen_or_pr')),
                        TextInput::make('visa_type')
                            ->label('Visa Type')
                            ->hidden(fn (callable $get) => $get('is_australian_citizen_or_pr')),
                        TextInput::make('reference_name'),
                        TextInput::make('reference_relationship'),
                        TextInput::make('reference_phone'),
                    ]),
                ])
                ->collapsible(),

            Section::make('Application Documents')
                ->schema([
                    FileUpload::make('resume_path')
                        ->label('Resume/CV')
                        ->disk('public')
                        ->directory('resumes')
                        ->preserveFilenames()
                        ->acceptedFileTypes([
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        ])
                        ->downloadable()
                        ->openable(),
                ])
                ->collapsible(),

            Section::make('Application Status')
                ->schema([
                    Select::make('status')
                        ->options([
                            'new' => 'New',
                            'reviewed' => 'Reviewed',
                            'interview' => 'Interview Scheduled',
                            'hired' => 'Hired',
                            'rejected' => 'Rejected',
                        ])
                        ->default('new'),
                    DatePicker::make('interview_date')
                        ->hidden(fn (callable $get) => $get('status') !== 'interview'),
                    Textarea::make('response_notes')
                        ->label('Admin Notes')
                        ->columnSpanFull(),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->searchable(),
                TextColumn::make('last_name')->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('job_position')
                    ->searchable(),
                TextColumn::make('preferred_location')
                    ->label('Preferred Location')
                    ->searchable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                        'interview' => 'Interview',
                        'hired' => 'Hired',
                        'rejected' => 'Rejected',
                    ])
                    ->rules(['required'])
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Applied On')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                        'interview' => 'Interview Scheduled',
                        'hired' => 'Hired',
                        'rejected' => 'Rejected',
                    ]),
                SelectFilter::make('job_position')
                    ->options(array_combine(Career::ROLES, Career::ROLES)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make('download_cv')
                    ->label('Download CV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (Career $record) => $record->resume_path ? Storage::disk('public')->url($record->resume_path) : null)
                    ->openUrlInNewTab()
                    ->hidden(fn (Career $record) => ! $record->resume_path),

                Action::make('respond')
                    ->label('Send Response')
                    ->icon('heroicon-o-envelope')
                    ->form([
                        Select::make('response_type')
                            ->options([
                                'interview' => 'Interview Invitation',
                                'additional_info' => 'Request Additional Information',
                                'rejection' => 'Rejection Notice',
                            ])
                            ->required()
                            ->reactive(),
                        DatePicker::make('interview_date')
                            ->label('Interview Date')
                            ->required()
                            ->hidden(fn (callable $get) => $get('response_type') !== 'interview'),
                        Textarea::make('response_message')
                            ->label('Message')
                            ->required(),
                    ])
                    ->action(function (Career $record, array $data) {
                        // Update the record first
                        $record->update([
                            'status' => $data['response_type'] === 'interview' ? 'interview' :
                                       ($data['response_type'] === 'rejection' ? 'rejected' : 'reviewed'),
                            'response_notes' => $data['response_message'],
                            'interview_date' => $data['interview_date'] ?? null,
                        ]);

                        // Send appropriate email
                        switch ($data['response_type']) {
                            case 'interview':
                                Mail::to($record->email)->send(
                                    new CareerInterviewInvitation(
                                        $record,
                                        $data['interview_date'],
                                        $data['response_message']
                                    )
                                );
                                break;

                            case 'rejection':
                                Mail::to($record->email)->send(
                                    new CareerRejection(
                                        $record,
                                        $data['response_message']
                                    )
                                );
                                break;

                            case 'additional_info':
                                Mail::to($record->email)->send(
                                    new CareerInfoRequest(
                                        $record,
                                        $data['response_message']
                                    )
                                );
                                break;
                        }

                        Notification::make()
                            ->title('Response sent successfully')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('markAsReviewed')
                    ->label('Mark as Reviewed')
                    ->icon('heroicon-o-check')
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'reviewed']))
                    ->deselectRecordsAfterCompletion(),
                Tables\Actions\BulkAction::make('sendRejection')
                    ->label('Send Rejection')
                    ->icon('heroicon-o-x-mark')
                    ->form([
                        Textarea::make('message')
                            ->label('Rejection Message')
                            ->required(),
                    ])
                    ->action(function (Collection $records, array $data) {
                        $records->each(function ($record) use ($data) {
                            $record->update([
                                'status' => 'rejected',
                                'response_notes' => $data['message'],
                            ]);
                            // Send rejection email here
                        });
                    }),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            // 'view' => Pages\ViewCareer::route('/{record}'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
