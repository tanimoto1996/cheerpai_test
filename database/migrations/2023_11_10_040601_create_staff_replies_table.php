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
        Schema::create('staff_replies', function (Blueprint $table) {
            $table->comment('スタッフ返信');
            
            // IDや認証に関連するカラム
            $table->increments('reply_id')->comment('返信ID');
            
            // ユーザー情報に関連するカラム
            $table->integer('tip_id')->comment('投げ銭ID');

            // その他のカラム
            $table->string('message', 200)->comment('メッセージ返信');
            
            // タイムスタンプ
            $table->timestamp('created_at')->nullable(false)->comment('登録日時');

            // 外部キー制約を設定
            $table->foreign('tip_id')->references('tip_id')->on('user_tips')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_replies');
    }
};
