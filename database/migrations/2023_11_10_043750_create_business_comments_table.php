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
        Schema::create('business_comments', function (Blueprint $table) {
            $table->comment('事業者コメント');

            // IDや認証に関連するカラム
            $table->increments('comment_id')->comment('事業者コメントID');
            $table->integer('business_id')->comment('事業者ID');
            $table->integer('user_id')->comment('投げ銭ユーザーID');

            // その他のカラム
            $table->string('comment', 100)->comment('コメント');

            // タイムスタンプ
            $table->timestamps();

            // 外部キー制約
            $table->foreign('business_id')->references('business_id')->on('business_operators')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_comments');
    }
};
