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
        Schema::create('user_profile_images', function (Blueprint $table) {
            $table->comment('ユーザー画像');

            // IDや認証に関連するカラム
            $table->increments('image_id')->comment('投げ銭ユーザー画像ID');
            $table->integer('user_id')->comment('投げ銭ユーザーID');
        
            // ユーザー情報に関連するカラム
            $table->string('file_type', 50)->comment('ファイルの種類: jpag, jpg, png, gif');
            $table->string('file_name', 255)->comment('ファイル名');
        
            // ファイル情報に関連するカラム
            $table->bigInteger('file_size')->nullable()->comment('ファイルサイズ: max:10M');
        
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
        Schema::dropIfExists('user_profile_images');
    }
};
