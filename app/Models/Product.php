<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'quantity',
        'description',
        'expiration_date',
        'status',
        'price',
    ];

        public function increaseQuantity(int $amount = 1): void
    {
        if ($amount < 1) {
            throw new \InvalidArgumentException('Amount must be greater than zero.');
        }

        $this->increment('quantity', $amount);
    }

    public function decreaseQuantity(int $amount = 1): bool
    {
        if ($amount < 1) {
            throw new \InvalidArgumentException('Amount must be greater than zero.');
        }

        $updated = static::query()
            ->whereKey($this->getKey())
            ->where('quantity', '>=', $amount)
            ->decrement('quantity', $amount);

        $this->refresh();

        return $updated > 0;
    }

}
