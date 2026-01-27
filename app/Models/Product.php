<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',
        'price',
        'type',
        'stock_quantity',
        'is_active',
        'image_path',
        'attributes',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'stock_quantity' => 'integer',
            'is_active' => 'boolean',
            'attributes' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $product->uuid = $product->uuid ?? (string) Str::uuid();
            $product->slug = $product->slug ?? Str::slug($product->name);
        });
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPriceInEurosAttribute(): float
    {
        return $this->price / 100;
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price_in_euros, 2).' €';
    }

    public function isInStock(): bool
    {
        if ($this->stock_quantity === null) {
            return true; // Unlimited stock
        }

        return $this->stock_quantity > 0;
    }

    public function decrementStock(int $quantity = 1): void
    {
        if ($this->stock_quantity !== null) {
            $this->decrement('stock_quantity', $quantity);
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('stock_quantity')
                ->orWhere('stock_quantity', '>', 0);
        });
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
