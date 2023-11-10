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
        Schema::create('business_settings', function (Blueprint $table) {
            $table->comment('事業者設定');

            // IDや認証に関連するカラム
            $table->increments('setting_id')->comment('事業者設定ID');
            
            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 3:事業者 4:法人');
            $table->integer('entity_id')->comment('利用者ID: 事業者/法人 ID');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_media_publish')->default(true)->comment('動画・画像公開設定: TRUE:公開 FALSE:非公開');
            $table->boolean('is_comment_publish')->default(true)->comment('事業者コメント公開設定: TRUE:公開 FALSE:非公開');
            $table->boolean('is_staff_ranking_publish')->default(false)->comment('業者内スタッフランキング公開設定: TRUE:公開 FALSE:非公開, 事');
            $table->boolean('is_auto_apply')->default(false)->comment('自動申請設定: TRUE:自動申請 FALSE:申請なし');
            $table->integer('auto_apply_amount')->default(2000)->comment('自動申請設定金額');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_settings');
    }
};
