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
        Schema::create('user_tips', function (Blueprint $table) {
            $table->comment('投げ銭');

            // IDや認証に関連するカラム
            $table->increments('tip_id')->comment('投げ銭ID');
            $table->integer('user_id')->comment('投げ銭ユーザーID');
            $table->integer('staff_id')->comment('スタッフID');

            // ユーザー情報に関連するカラム
            $table->string('guest_nickname', 50)->nullable()->comment('ゲスト用ニックネーム: ゲストのみ入力可能');

            // 設定や状態に関連するフラグなど
            $table->integer('tipping_amount')->comment('投げ銭額');
            $table->string('message', 200)->nullable()->comment('メッセージ');
            $table->integer('desk_number')->nullable()->comment('卓番');
            $table->boolean('is_user_read')->default(false)->comment('投げ銭ユーザー既読: TRUE:既読 FALSE:未読');
            $table->boolean('is_staff_read')->default(false)->comment('スタッフ既読: TRUE:既読 FALSE:未読');

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
        Schema::dropIfExists('user_tips');
    }
};
