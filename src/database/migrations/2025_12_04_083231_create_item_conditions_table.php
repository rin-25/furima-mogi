<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemConditionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('item_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');            // 状態名（例：新品・未使用 など）
            $table->integer('sort_order')->nullable(); // 表示順
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_conditions');
    }
}
