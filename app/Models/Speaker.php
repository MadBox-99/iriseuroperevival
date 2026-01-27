<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Speaker extends Model
{
    /** @use HasFactory<\Database\Factories\SpeakerFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'slug',
        'name',
        'title',
        'organization',
        'country',
        'bio',
        'photo_path',
        'type',
        'is_featured',
        'sort_order',
        'social_links',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'social_links' => 'array',
            'translations' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Speaker $speaker) {
            $speaker->uuid = $speaker->uuid ?? (string) Str::uuid();
            $speaker->slug = $speaker->slug ?? Str::slug($speaker->name);
        });
    }

    public function scheduleItems(): HasMany
    {
        return $this->hasMany(ScheduleItem::class);
    }

    public function getTranslatedAttribute(string $attribute, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->translations ?? [];

        return $translations[$locale][$attribute] ?? $this->$attribute;
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
