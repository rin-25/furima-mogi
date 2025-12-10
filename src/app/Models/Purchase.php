<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buyer_id',
        'amount',
        'payment_method',
        'stripe_payment_id',
        'payment_status',
        'shipping_postal_code',
        'shipping_address',
        'shipping_building',
        'purchased_at',
    ];

    protected $casts = [
        'purchased_at' => 'datetime',
    ];

    /**
     * 購入した商品
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * 購入者
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}


