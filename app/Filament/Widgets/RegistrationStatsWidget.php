<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RegistrationStatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalRegistrations = Registration::count();
        $attendees = Registration::where('type', 'attendee')->count();
        $ministryTeam = Registration::where('type', 'ministry')->count();
        $volunteers = Registration::where('type', 'volunteer')->count();
        $pendingApprovals = Registration::where('status', 'pending_approval')->count();
        $paidRegistrations = Registration::whereNotNull('paid_at')->count();
        $totalRevenue = Registration::whereNotNull('paid_at')->sum('amount');

        return [
            Stat::make('Total Registrations', $totalRegistrations)
                ->description('All registration types')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Attendees', $attendees)
                ->description('Paid attendees')
                ->descriptionIcon('heroicon-o-ticket')
                ->color('info'),

            Stat::make('Ministry Team', $ministryTeam)
                ->description('Applications received')
                ->descriptionIcon('heroicon-o-hand-raised')
                ->color('warning'),

            Stat::make('Volunteers', $volunteers)
                ->description('Volunteer registrations')
                ->descriptionIcon('heroicon-o-heart')
                ->color('success'),

            Stat::make('Pending Approvals', $pendingApprovals)
                ->description('Awaiting review')
                ->descriptionIcon('heroicon-o-clock')
                ->color($pendingApprovals > 0 ? 'warning' : 'success'),

            Stat::make('Total Revenue', '€'.number_format($totalRevenue / 100, 2))
                ->description($paidRegistrations.' paid registrations')
                ->descriptionIcon('heroicon-o-currency-euro')
                ->color('success'),
        ];
    }
}
