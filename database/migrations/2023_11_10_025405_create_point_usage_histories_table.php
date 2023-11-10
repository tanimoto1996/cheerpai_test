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
        Schema::create('point_usage_histories', function (Blueprint $table) {
            $table->comment('ポイント利用履歴');

            // IDや認証に関連するカラム
            $table->increments('usage_id')->comment('ポイント利用履歴ID');

            // ユーザー情報に関連するカラム
            $table->integer('detail_id')->nullable()->comment('ポイント詳細ID: ゲストの場合はNULL');
            $table->integer('tip_id')->comment('投げ銭ID');

            // 設定や状態に関連するフラグなど
            $table->integer('used_points')->comment('利用ポイント数');

            // タイムスタンプ
            $table->timestamps();

            // 外部キー制約
            $table->foreign('detail_id')->references('detail_id')->on('point_details')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
            $table->foreign('tip_id')->references('tip_id')->on('user_tips')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_usage_histories');
    }
};
