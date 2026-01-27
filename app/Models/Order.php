<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'uuid',
        'email',
        'customer_name',
        'phone',
        'billing_address',
        'shipping_address',
        'status',
        'subtotal',
        'discount',
        'total',
        'promotion_code_id',
        'stripe_session_id',
        'stripe_payment_intent',
        'paid_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'integer',
            'discount' => 'integer',
            'total' => 'integer',
            'paid_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->uuid = $order->uuid ?? (string) Str::uuid();
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function promotionCode(): BelongsTo
    {
        return $this->belongsTo(PromotionCode::class);
    }

    public function getTotalInEurosAttribute(): float
    {
        return $this->total / 100;
    }

    public function getFormattedTotalAttribute(): string
    {
        return number_format($this->total_in_euros, 2).' €';
    }

    public function getSubtotalInEurosAttribute(): float
    {
        return $this->subtotal / 100;
    }

    public function getDiscountInEurosAttribute(): float
    {
        return $this->discount / 100;
    }

    public function isPaid(): bool
    {
        return $this->paid_at !== null;
    }

    public function markAsPaid(): void
    {
        $this->update([
            'status' => 'paid',
            'paid_at' => now(),
        ]);
    }

    public function calculateTotals(): void
    {
        $this->subtotal = $this->items->sum('total');
        $this->discount = $this->calculateDiscount();
        $this->total = $this->subtotal - $this->discount;
    }

    protected function calculateDiscount(): int
    {
        if (! $this->promotionCode) {
            return 0;
        }

        return $this->promotionCode->calculateDiscount($this->subtotal);
    }

    public function scopeOfStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
