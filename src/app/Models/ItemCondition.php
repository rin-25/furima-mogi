<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCondition extends Model
{
    use HasFactory;

    // テーブル名は item_conditions なのでデフォルトのままでOK

    protected $fillable = [
        'name',
        'sort_order',
    ];

    // 必要ならリレーション（あとで使いたくなったとき用）
    public function products()
    {
        return $this->hasMany(Product::class, 'condition_id');
    }
}
