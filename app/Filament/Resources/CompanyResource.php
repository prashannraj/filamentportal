<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            Forms\Components\TextInput::make('website')
                ->required()
                ->maxLength(255),
            Forms\Components\FileUpload::make('logo') // Changed to FileUpload
                ->required()
                ->maxSize(1024) // Set max size (1MB here as an example)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']), // Specify accepted file types
            Forms\Components\FileUpload::make('stamp') // Changed to FileUpload
                ->required()
                ->maxSize(1024)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
            Forms\Components\FileUpload::make('regulated_logo') // Changed to FileUpload
                ->required()
                ->maxSize(1024)
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),
            Forms\Components\TextInput::make('telephone')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('registred_in')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('regulated_by')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('vat')
                ->required()
                ->maxLength(255),
            Forms\Components\Textarea::make('footnote') // Changed to TextArea
                ->required()
                ->maxLength(5000), // Adjusted max length if needed
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
            Tables\Columns\TextColumn::make('website')
                ->searchable(),
            Tables\Columns\TextColumn::make('logo') // Display as text, adjust as needed
                ->searchable(),
            Tables\Columns\TextColumn::make('stamp') // Display as text, adjust as needed
                ->searchable(),
            Tables\Columns\TextColumn::make('telephone')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('registred_in')
                ->searchable(),
            Tables\Columns\TextColumn::make('regulated_by')
                ->searchable(),
            Tables\Columns\TextColumn::make('regulated_logo') // Display as text, adjust as needed
                ->searchable(),
            Tables\Columns\TextColumn::make('vat')
                ->searchable(),
            Tables\Columns\TextColumn::make('footnote')
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
