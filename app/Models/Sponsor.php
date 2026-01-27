<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    /** @use HasFactory<\Database\Factories\SponsorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_path',
        'website_url',
        'tier',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfTier($query, string $tier)
    {
        return $query->where('tier', $tier);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeByTierPriority($query)
    {
        return $query->orderByRaw("CASE tier
            WHEN 'platinum' THEN 1
            WHEN 'gold' THEN 2
            WHEN 'silver' THEN 3
            WHEN 'bronze' THEN 4
            ELSE 5 END");
    }
}
