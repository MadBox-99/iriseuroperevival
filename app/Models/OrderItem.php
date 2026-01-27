<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'unit_price',
        'total',
        'attributes',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'unit_price' => 'integer',
            'total' => 'integer',
            'attributes' => 'array',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (OrderItem $item) {
            $item->total = $item->unit_price * $item->quantity;
        });

        static::updating(function (OrderItem $item) {
            $item->total = $item->unit_price * $item->quantity;
        });
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUnitPriceInEurosAttribute(): float
    {
        return $this->unit_price / 100;
    }

    public function getTotalInEurosAttribute(): float
    {
        return $this->total / 100;
    }
}
