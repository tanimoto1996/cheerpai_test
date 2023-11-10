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
        Schema::create('point_details', function (Blueprint $table) {
            $table->comment('ポイント詳細');
            
            // IDや認証に関連するカラム
            $table->increments('detail_id')->comment('ポイント詳細ID');
            
            // ユーザー情報に関連するカラム
            $table->integer('buy_id')->comment('ポイント購入履歴ID');

            // 設定や状態に関連するフラグなど
            $table->integer('buy_points')->nullable()->comment('購入時のポイント数');
            $table->integer('remaining_points')->nullable()->comment('残りポイント数');
            $table->boolean('is_point_usable')->default(true)->comment('ポイント利用可能フラグ: TRUE:利用可能、FALSE:利用不可');

            // タイムスタンプ
            $table->timestamp('expiration_date')->comment('有効期限');
            $table->timestamps();
            
            // 外部キー制約の設定
            $table->foreign('buy_id')->references('buy_id')->on('point_buy_histories')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_details');
    }
};
