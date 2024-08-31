<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Guest;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuestResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuestResource\RelationManagers;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->label('Name'),
                TextColumn::make('name.first_name')->searchable()->sortable()->label('Inviter'),
                TextColumn::make('address')->searchable()->sortable()->label('Address')->limit(20),
                TextColumn::make('car_brand')->searchable()->sortable()->label('Brand'),
                TextColumn::make('bodyType.name')->searchable()->sortable()->label('Body Type'),
                TextColumn::make('car_color')->searchable()->sortable()->label('Color'),
                TextColumn::make('car_license_plate')->searchable()->sortable()->label('Plate #'),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGuests::route('/'),
            //'create' => Pages\CreateGuest::route('/create'),
            //'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
