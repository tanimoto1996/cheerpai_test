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
        Schema::create('point_fluctuation_histories', function (Blueprint $table) {
            $table->comment('ポイント変動履歴');

            // IDや認証に関連するカラム
            $table->increments('fluctuation_id')->comment('ポイント変動履歴ID');

            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフのID');

            // 設定や状態に関連するフラグなど
            $table->decimal('point_change', 10)->comment('ポイント変動量: 例）100(ユーザー:-100, スタッフ:+100)');
            $table->integer('transaction_id')->comment('トランザクションID');
            $table->smallInteger('transaction_type')->comment('トランザクションタイプ: 1:投げ銭 2:購入 3:振込');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_fluctuation_histories');
    }
};
