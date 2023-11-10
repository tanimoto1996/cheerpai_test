<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->comment('投げ銭ユーザー会員情報');
        
            // IDや認証に関連するカラム
            $table->increments('user_id')->comment('ユーザーID');
            $table->string('email', 255)->unique()->comment('メールアドレス: 暗号化');
            $table->string('password', 100)->comment('パスワード');
            $table->rememberToken()->comment('持続ログイントークン');
            $table->timestamp('email_verified_at')->nullable()->comment('トークン認証日時');
        
            // ユーザー情報に関連するカラム
            $table->string('nickname', 50)->comment('ニックネーム');
            $table->string('birthdate', 255)->comment('生年月日: 暗号化');
        
            // 設定や状態に関連するフラグなどなど
            $table->integer('paid_points')->default(0)->comment('保有有償ポイント数');
            $table->integer('free_points')->default(0)->comment('保有無償ポイント数');
            $table->integer('ai_count')->default(3)->comment('AIメッセージ使用回数: MAX:3 MIN:0');
            $table->boolean('is_show_ranking')->default(true)->comment('ランキング公開フラグ');
            $table->boolean('is_blocked')->default(false)->comment('ブロックフラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->timestamp('blocked_at')->nullable()->comment('ブロック日時');
        
            // タイムスタンプ
            $table->softDeletes()->comment('削除日時');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
