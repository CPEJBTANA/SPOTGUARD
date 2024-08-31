<?php

namespace App\Filament\Resources;

use App\Models\User;

use Filament\Tables;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\ResidentResource\Pages;

class ResidentResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $pluralModelLabel = 'Residents';
    protected static ?string $modelLabel = 'Resident';
    protected static ?string $navigationIcon = 'heroicon-s-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')->required()->maxLength(255),
                TextInput::make('first_name')->required()->maxLength(255),
                TextInput::make('middle_name')->maxLength(255),
                TextInput::make('last_name')->required()->maxLength(255),
                DatePicker::make('birth_date')->required(),
                TextInput::make('mobile_number')->required()->prefix('+63')->numeric(),

                TextInput::make('address')->required()->maxLength(255),
                TextInput::make('car_brand')->required()->maxLength(255),
                TextInput::make('body_type_id')->required()->maxLength(255),
                TextInput::make('car_color')->required()->maxLength(255),
                TextInput::make('car_license_plate')->required()->maxLength(255),

                TextInput::make('password')->password()->maxLength(255)
                    ->dehydrateStateUsing(static fn(null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                    ->required(static fn(Page $livewire): string => $livewire instanceof CreateStudent, )
                    ->dehydrated(static fn(null|string $state): bool => filled($state), )

                    ->label(static fn(Page $livewire): string => ($livewire instanceof EditStudent) ? 'New Password' : 'Password'),

                CheckboxList::make('roles')->relationship('roles', 'name')->columns(2)
                    // ->helperText('Choose One!')->required()
                    ->label('Role')
                    ->default([Role::where('name', 'Resident')->first()->id])
                    ->disabled(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::whereHas('roles', function ($query) {
                $query->where('name', 'Resident');
            })->orderBy('created_at', 'DESC'))

            ->columns([
                TextColumn::make('username')->searchable()->sortable()->label('Username'),
                TextColumn::make('first_name')->sortable()->searchable()->label('Name')
                    ->formatStateUsing(function ($state, User $user) {
                        return $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
                    }),
                TextColumn::make('mobile_number')->searchable()->sortable()->label('Mobile #'),

                TextColumn::make('address')->searchable()->sortable()->label('Address')->limit(20),
                TextColumn::make('car_brand')->searchable()->sortable()->label('Brand'),

                TextColumn::make('bodyType.name')->searchable()->sortable()->label('Body Type'),
                TextColumn::make('car_color')->searchable()->sortable()->label('Color'),
                TextColumn::make('car_license_plate')->searchable()->sortable()->label('Plate #'),
            ])
            ->filters([
                SelectFilter::make('bodyType')
                    ->relationship('bodyType', 'name')
                    ->searchable()
                    ->label('Body Type')

                    ->preload(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
