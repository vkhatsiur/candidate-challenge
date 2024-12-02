<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Money\Currency;
use Money\Money;

class Listing extends Model
{
    use HasFactory, SoftDeletes;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function priceFormatted() : Money
    {
        return new Money($this->price, new Currency($this->currency));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
