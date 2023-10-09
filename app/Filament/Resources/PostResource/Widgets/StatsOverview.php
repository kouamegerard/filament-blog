<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Unique views', Post::all()->count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Orders', Post::all()->count() . '%')
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Cancelled Orders', Post::all()->count() * 2)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Chart views', '192.1k')
                ->description('22k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
        ];
    }
}
