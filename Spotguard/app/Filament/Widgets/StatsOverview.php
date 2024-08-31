<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $resident = User::whereHas('roles', function ($query) {
            $query->where('name', 'Resident');
        })->count();




        return [
            Card::make('Residents', $resident)
                ->description('counts')
                ->descriptionIcon('heroicon-s-user-group'),

            Card::make('Guests', 4)
                ->description('counts')
                ->descriptionIcon('heroicon-s-users'),

            Card::make('Plate Numbers', $resident)
                ->description('counts')
                ->descriptionIcon('heroicon-s-document-text'),

        ];
    }
}
