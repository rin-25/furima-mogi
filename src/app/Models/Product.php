<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // データ登録に必要な fillable を定義
    protected $fillable = [
        'seller_id',
        'name',
        'brand_name',
        'description',
        'price',
        'condition_id',
        'image_path',
        'status',
        'sold_at',
    ];

    // ===== リレーション =====

    // 出品者（ユーザーとのリレーション）
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // コンディション（item_conditions）
    public function condition()
    {
        return $this->belongsTo(ItemCondition::class, 'condition_id');
    }

    // カテゴリ（多対多）
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    // コメント
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // いいね
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // 購入情報
    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
