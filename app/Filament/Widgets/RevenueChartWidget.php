<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class RevenueChartWidget extends ChartWidget
{
    protected ?string $heading = 'Revenue Over Time';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = $this->getRevenuePerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Revenue (€)',
                    'data' => $data['revenue'],
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'Registrations',
                    'data' => $data['count'],
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getRevenuePerMonth(): array
    {
        $months = collect();
        $revenue = collect();
        $count = collect();

        // Get data for the last 6 months
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months->push($date->format('M Y'));

            $monthlyData = Registration::whereNotNull('paid_at')
                ->whereYear('paid_at', $date->year)
                ->whereMonth('paid_at', $date->month)
                ->selectRaw('SUM(amount) as total, COUNT(*) as count')
                ->first();

            $revenue->push(($monthlyData->total ?? 0) / 100);
            $count->push($monthlyData->count ?? 0);
        }

        return [
            'labels' => $months->toArray(),
            'revenue' => $revenue->toArray(),
            'count' => $count->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
