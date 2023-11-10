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
        Schema::create('tipping_amount_settings', function (Blueprint $table) {
            $table->comment('投げ銭金額設定');
            
            // IDや認証に関連するカラム
            $table->increments('setting_id')->comment('投げ銭金額設定ID');
            
            // 設定や状態に関連するフラグなど
            $table->integer('amount')->comment('投げ銭額: 300（pt）など単体で設定する');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipping_amount_settings');
    }
};
