<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 出品者（ユーザー）
            $table->foreignId('seller_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('name');                // 商品名
            $table->string('brand_name')->nullable(); // ブランド名
            $table->text('description');           // 商品説明
            $table->integer('price');              // 販売価格

            // 商品の状態マスタ
            $table->foreignId('condition_id')
                ->constrained('item_conditions')
                ->cascadeOnDelete();

            $table->string('image_path');          // 商品画像パス（storage）
            $table->tinyInteger('status')->default(0); // 0: 出品中, 1: SOLD など
            $table->timestamp('sold_at')->nullable();   // 売れた日時

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
