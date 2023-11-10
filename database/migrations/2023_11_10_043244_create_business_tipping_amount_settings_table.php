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
        Schema::create('business_tipping_amount_settings', function (Blueprint $table) {
            $table->comment('事業者投げ銭金額設定');

            // IDや認証に関連するカラム
            $table->increments('amount_setting_id')->comment('事業者投げ銭金額設定ID');
            $table->integer('business_id')->comment('事業者ID');
            $table->integer('setting_id')->comment('投げ銭金額ID');

            // タイムスタンプ
            $table->timestamps();

            // 外部キー制約
            $table->foreign('business_id')->references('business_id')->on('business_operators');
            $table->foreign('setting_id')->references('setting_id')->on('tipping_amount_settings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_tipping_amount_settings');
    }
};
