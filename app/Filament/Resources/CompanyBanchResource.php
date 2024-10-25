<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyBanchResource\Pages;
use App\Filament\Resources\CompanyBanchResource\RelationManagers;
use App\Models\CompanyBanch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyBanchResource extends Resource
{
    protected static ?string $model = CompanyBanch::class;

    protected static ?string $navigationIcon = 'heroicon-s-home';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Company info';
    protected static ?string $navigationLabel = 'Company Branch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('registration_no')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('websote')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('logo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stamp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('websote')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stamp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCompanyBanches::route('/'),
            'create' => Pages\CreateCompanyBanch::route('/create'),
            'view' => Pages\ViewCompanyBanch::route('/{record}'),
            'edit' => Pages\EditCompanyBanch::route('/{record}/edit'),
        ];
    }
}
