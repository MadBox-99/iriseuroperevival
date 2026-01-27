<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScheduleItem extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleItemFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'day',
        'start_time',
        'end_time',
        'type',
        'speaker_id',
        'location',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'day' => 'date',
            'start_time' => 'datetime:H:i',
            'end_time' => 'datetime:H:i',
            'translations' => 'array',
        ];
    }

    public function speaker(): BelongsTo
    {
        return $this->belongsTo(Speaker::class);
    }

    public function getTranslatedAttribute(string $attribute, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->translations ?? [];

        return $translations[$locale][$attribute] ?? $this->$attribute;
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOnDay($query, $day)
    {
        return $query->whereDate('day', $day);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('day')->orderBy('start_time');
    }
}
