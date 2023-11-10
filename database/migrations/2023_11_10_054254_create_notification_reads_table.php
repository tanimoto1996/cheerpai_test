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
        Schema::create('notification_reads', function (Blueprint $table) {
            $table->comment('お知らせ既読');

            // IDや認証に関連するカラム
            $table->increments('read_id')->comment('お知らせ既読ID');
            $table->integer('notification_id')->comment('お知らせID');

            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ 3:事業者');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人 ID');

            // タイムスタンプ
            $table->timestamps();

            // 外部キー制約
            $table->foreign('notification_id')->references('notification_id')->on('notifications')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_reads');
    }
};
