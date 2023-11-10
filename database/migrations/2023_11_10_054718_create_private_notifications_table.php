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
        Schema::create('private_notifications', function (Blueprint $table) {
            $table->comment('個人向けお知らせ');

            // IDや認証に関連するカラム
            $table->increments('notification_id')->comment('個人向けお知らせID');
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ 3:事業者');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人 ID');

            // ユーザー情報に関連するカラム
            $table->string('title', 50)->comment('タイトル');
            $table->text('content')->comment('内容');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_read')->default(false)->comment('既読フラグ: TURE:既読 FALSE:未読');

            // タイムスタンプ
            $table->timestamp('start_at')->nullable()->comment('掲載開始日時');
            $table->timestamp('end_at')->nullable()->comment('掲載終了日時');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_notifications');
    }
};
