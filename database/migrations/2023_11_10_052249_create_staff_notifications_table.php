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
        Schema::create('staff_notifications', function (Blueprint $table) {
            $table->comment('スタッフ通知');

            $table->increments('notification_id')->comment('スタッフ通知ID');
            $table->integer('staff_id')->comment('スタッフID');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_message_notified')->default(false)->comment('通知設定: TRUE:受け取る FALSE:受け取らない');

            // ユーザー情報に関連するカラム
            $table->text('token')->nullable()->comment('トークン: 利用する際にpushcodeより、トークン取得。初回のON:レコード作成、token取得。');

            // タイムスタンプ
            $table->timestamps();

            // 外部キー制約
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_notifications');
    }
};
