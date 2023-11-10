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
        Schema::create('staff_favorites', function (Blueprint $table) {
            $table->comment('お気に入りスタッフ');

            // IDや認証に関連するカラム
            $table->increments('favorite_id')->comment('お気に入りID');
            
            // ユーザー情報に関連するカラム
            $table->integer('user_id')->comment('投げ銭ユーザーID');
            $table->integer('staff_id')->comment('スタッフID');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約の設定
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_favorites');
    }
};
