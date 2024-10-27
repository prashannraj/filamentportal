<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneralFormResource\Pages;
use App\Filament\Resources\GeneralFormResource\RelationManagers;
use App\Models\GeneralForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                ->reactive()
                ->afterStateUpdated(function (callable $get, callable $set) {
                    // If the selected title is 'Other', show the other_field
                    if ($get('title') === 'Other') {
                        $set('show_other_text', true);
                    } else {
                        $set('show_other_text', false);
                        $set('other_text', null); // Reset other_field if not 'Other'
                    }
                })
                ->columnSpan(1), // Adjust column span as needed
            Forms\Components\TextInput::make('f_name')->label('First Name:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('m_name')->label('Middle Name:')
                ->maxLength(255)
                ->default(null)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('l_name')->label('Last Name:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\DatePicker::make('birthdate')->label('Date of Birth:')
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('country_iso_mobile')->label('Mobile Country Code:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('mobile')->label('Mobile Number:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('country_code')->label('Country Code:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('email')->label('Email:')
                ->email()
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\TextInput::make('appellant_nation')->label('Appellant Nation:')
                ->required()
                ->maxLength(255)
                ->columnSpan(1), // First column
            Forms\Components\Textarea::make('appellant_address')->label('Address:')
                ->required()
                ->columnSpan(1), // First column
            Forms\Components\Richeditor::make('enquiry_details')->label('Enquiry/Instrution')
                ->required()
                ->columnSpanFull(), // Full width
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
