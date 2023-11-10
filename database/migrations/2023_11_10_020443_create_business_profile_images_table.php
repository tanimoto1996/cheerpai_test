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
        Schema::create('business_profile_images', function (Blueprint $table) {
            $table->comment('事業者画像');

            // IDや認証に関連するカラム
            $table->increments('image_id')->comment('事業者画像ID');
            $table->integer('business_id')->comment('事業者ID');
        
            // ユーザー情報に関連するカラム
            $table->string('file_type', 50)->comment('ファイルの種類: jpag, jpg, png, gif');
            $table->string('file_name', 255)->comment('ファイル名');
            $table->bigInteger('file_size')->nullable()->comment('ファイルサイズ: max:10M');
        
            // 設定や状態に関連するフラグなど
            $table->smallInteger('order')->comment('表示順: 1ユーザー3つまで');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約
            $table->foreign('business_id')->references('business_id')->on('business_operators')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_profile_images');
    }
};
