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
        Schema::create('total_tips', function (Blueprint $table) {
            $table->comment('累計投げ銭');

            // IDや認証に関連するカラム
            $table->increments('total_tip_id')->comment('累計投げ銭ID');
            $table->string('year_month', 10)->comment('年月: YYYYMM');

            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザーID/スタッフID');

            // 設定や状態に関連するフラグなど
            $table->integer('total_amount')->comment('投げ銭総額');

            // タイムスタンプ
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_tips');
    }
};
