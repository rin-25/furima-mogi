<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');

            // 購入した商品
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            // 購入者
            $table->foreignId('buyer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->integer('amount');                  // 購入金額（商品価格）
            $table->string('payment_method');           // 'convenience_store' or 'card' など
            $table->string('stripe_payment_id')->nullable(); // Stripeの決済IDなど
            $table->string('payment_status')->nullable();    // 'pending', 'paid', など必要に応じて

            // 購入時点の配送先（ユーザーのプロフィールから初期表示し、変更も可）
            $table->string('shipping_postal_code');     // 郵便番号
            $table->string('shipping_address');         // 住所
            $table->string('shipping_building')->nullable(); // 建物名

            $table->timestamp('purchased_at');          // 購入完了日時

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
}
