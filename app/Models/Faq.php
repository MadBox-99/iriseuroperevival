<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /** @use HasFactory<\Database\Factories\FaqFactory> */
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'sort_order',
        'is_published',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'translations' => 'array',
        ];
    }

    public function getTranslatedAttribute(string $attribute, ?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->translations ?? [];

        return $translations[$locale][$attribute] ?? $this->$attribute;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOfCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
