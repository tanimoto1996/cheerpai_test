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
        Schema::create('payment_info', function (Blueprint $table) {
            $table->comment('支払い情報');

            // IDや認証に関連するカラム
            $table->increments('payment_info_id')->comment('クレジット情報ID');
            $table->integer('user_id')->comment('投げ銭ユーザーID');
            $table->text('token')->comment('トークン');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_info');
    }
};
