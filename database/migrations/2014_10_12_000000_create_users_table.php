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
        	$table->id('user_id')->comment('ユーザーID');
            $table->string('nickname', 50)->comment('ニックネーム');
            $table->string('email', 255)->unique()->comment('メールアドレス');
            $table->string('password', 100)->comment('パスワード');
            $table->date('birthdate')->nullable()->comment('生年月日');
            $table->integer('paid_points')->default(0)->comment('保有有償ポイント数');
            $table->integer('free_points')->default(0)->comment('保有無償ポイント数');
            $table->integer('ai_count')->default(3)->comment('AIメッセージ使用回数');
            $table->rememberToken()->comment('持続ログイントークン');
            $table->boolean('is_show_ranking')->default(true)->comment('ランキング公開フラグ');
            $table->boolean('is_blocked')->default(false)->comment('ブロックフラグ');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
            $table->timestamp('email_verified_at')->nullable()->comment('トークン認証日時');
            $table->timestamps();
            $table->timestamp('blocked_at')->nullable()->comment('ブロック日時');
            $table->timestamp('deleted_at')->nullable()->comment('削除日時');
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
