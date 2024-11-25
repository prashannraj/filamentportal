<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralFormResource\Pages;
use App\Models\GeneralForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GeneralFormResource extends Resource
{
    protected static ?string $model = GeneralForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('title')
                    ->required()
                    ->options([
                        'Mr' => 'Mr',
                        'Miss' => 'Miss',
                        'Doctor' => 'Doctor',
                        'Mrs' => 'Mrs',
                        'Professor' => 'Professor',
                        'Other' => 'Other',
                    ])
                    ->reactive() // Enable reactivity
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        // If 'Other' is selected, show 'other_text', else hide it
                        if ($get('title') === 'Other') {
                            $set('show_other_text', true);
                        } else {
                            $set('show_other_text', false);
                            $set('other_text', null); // Reset 'other_text' if not 'Other'
                        }
                    })
                    ->columnSpan(1), // Adjust column span
                // Conditionally show 'other_text' input field if 'title' is 'Other'
                Forms\Components\TextInput::make('other_text')
                    ->label('Other Title (Please specify):')
                    ->nullable()
                    ->hidden(fn (callable $get) => $get('title') !== 'Other') // Hide unless 'Other' is selected
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('f_name')->label('First Name:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('m_name')->label('Middle Name:')
                    ->maxLength(255)
                    ->default(null)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('l_name')->label('Last Name:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\DatePicker::make('birthdate')->label('Date of Birth:')
                    ->columnSpan(1),

                Forms\Components\TextInput::make('country_iso_mobile')->label('Mobile Country Code:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('mobile')->label('Mobile Number:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('country_code')->label('Country Code:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('email')->label('Email:')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\TextInput::make('appellant_nation')->label('Appellant Nation:')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Forms\Components\Textarea::make('appellant_address')->label('Address:')
                    ->required()
                    ->columnSpan(1),

                Forms\Components\Richeditor::make('enquiry_details')->label('Enquiry/Instruction')
                    ->required()
                    ->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('f_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('m_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('l_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('birthdate')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('country_iso_mobile')
                    ->searchable(),

                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),

                Tables\Columns\TextColumn::make('country_code')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('appellant_nation')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGeneralForms::route('/'),
            'create' => Pages\CreateGeneralForm::route('/create'),
            'view' => Pages\ViewGeneralForm::route('/{record}'),
            'edit' => Pages\EditGeneralForm::route('/{record}/edit'),
        ];
    }
}
