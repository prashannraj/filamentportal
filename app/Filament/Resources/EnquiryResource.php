<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Filament\Resources\EnquiryResource\RelationManagers;
use App\Models\Enquiry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\CreateRecord;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status') // Change TextInput to Select
                    ->required()
                    ->options([
                        'active' => 'Active', // Key-value pairs for options
                        'disabled' => 'Disabled',
                    ])
                    ->placeholder('Select a status'), // Optional placeholder
                Forms\Components\Select::make('type') // Keep the type field as Select
                    ->required()
                    ->options([
                        'general_form' => 'General Form',
                        'immigration_form' => 'Immigration Form',
                    ])
                    ->placeholder('Select a type'),

            ]);
    }

    public static function view($record): View
    {
        // Increment the click count when the enquiry is viewed
        $record->incrementClickCount();

        return view('filament.resources.enquiry-resource.show', [
            'record' => $record,
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                ->label('Type') // Optional: Set a custom label for the column
                ->formatStateUsing(fn ($record) => $record->getTypeLabel()) // Use the getTypeLabel method
                ->searchable(),
                Tables\Columns\TextColumn::make('click_count') // Add Click Count Column
                ->label('views'),
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
                Tables\Actions\Action::make('redirectToForm')
                ->label('Go to Form')
                ->icon('heroicon-o-arrow-right')
                ->action(function ($record) {
                    // Redirect logic based on the type of enquiry
                    if ($record->type === 'general_form') {
                        return redirect('http://127.0.0.1:8000/admin/general-forms/create'); // Replace with your actual route
                    } elseif ($record->type === 'immigration_form') {
                        return redirect('http://127.0.0.1:8000/admin/immigration-forms/create'); // Replace with your actual route
                    }
                }),
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
            'index' => Pages\ListEnquiries::route('/'),
            'create' => Pages\CreateEnquiry::route('/create'),
            'view' => Pages\ViewEnquiry::route('/{record}'),
            'edit' => Pages\EditEnquiry::route('/{record}/edit'),
        ];
    }
}
