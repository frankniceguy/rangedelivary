<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Courier;
use App\Models\Recipient;
use App\Models\Sender;


use Filament\Widgets\StatsOverviewWidget\Card;

class AdminWidgets extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Couriers',Courier::count()),
            Stat::make('Total Senders',Sender::count()),
            Stat::make('Total Recipients',Recipient::count()),
        ];
    }
}
