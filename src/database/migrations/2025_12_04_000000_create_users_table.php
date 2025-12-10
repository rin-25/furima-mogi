<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');                         // ユーザー名
            $table->string('email')->unique();              // メールアドレス（ユニーク）
            $table->timestamp('email_verified_at')->nullable(); // メール認証日時
            $table->string('password');                     // パスワード
            $table->string('profile_image_path')->nullable(); // プロフィール画像パス（storage）
            $table->string('postal_code')->nullable();      // 郵便番号
            $table->string('address')->nullable();          // 住所
            $table->string('building')->nullable();         // 建物名
            $table->rememberToken();                        // remember_token
            $table->timestamps();                           // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
