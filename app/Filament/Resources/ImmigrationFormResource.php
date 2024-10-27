<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImmigrationFormResource\Pages;
use App\Filament\Resources\ImmigrationFormResource\RelationManagers;
use App\Models\ImmigrationForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImmigrationFormResource extends Resource
{
    protected static ?string $model = ImmigrationForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('refusalletterdte')
                    ->required(),
                Forms\Components\DatePicker::make('refusalreceiveddata')
                    ->required(),
                Forms\Components\TextInput::make('applicationlocation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('uan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ho_ref')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('decison_received')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('other_text')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('f_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('m_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('l_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('birthdate'),
                Forms\Components\TextInput::make('nation_of')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('country_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('appellant_nation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('appellant_address')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('has_uk_sponsor')
                    ->required(),
                Forms\Components\TextInput::make('sponsor_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sponsor_relation')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sponsor_email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sponsor_phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('sponsor_address')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sponsor_city')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('sponsor_preferred')
                    ->required(),
                Forms\Components\TextInput::make('sponsor_preEmail')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('preparedby')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('visa')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('prepared_email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('appellant_email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('authorise')
                    ->required(),
                Forms\Components\TextInput::make('authorise_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('extra_details')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('refusal_document')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('appellant_passport')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('proff_address')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('refusalletterdte')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('refusalreceiveddata')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('applicationlocation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ho_ref')
                    ->searchable(),
                Tables\Columns\TextColumn::make('decison_received')
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('nation_of')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('appellant_nation')
                    ->searchable(),
                Tables\Columns\IconColumn::make('has_uk_sponsor')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sponsor_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_relation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_city')
                    ->searchable(),
                Tables\Columns\IconColumn::make('sponsor_preferred')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sponsor_preEmail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preparedby')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prepared_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('appellant_email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('authorise')
                    ->boolean(),
                Tables\Columns\TextColumn::make('authorise_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('refusal_document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('appellant_passport')
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
            'index' => Pages\ListImmigrationForms::route('/'),
            'create' => Pages\CreateImmigrationForm::route('/create'),
            'view' => Pages\ViewImmigrationForm::route('/{record}'),
            'edit' => Pages\EditImmigrationForm::route('/{record}/edit'),
        ];
    }
}
