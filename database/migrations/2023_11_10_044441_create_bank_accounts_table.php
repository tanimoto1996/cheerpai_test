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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->comment('振込口座');

            // IDや認証に関連するカラム
            $table->increments('account_id')->comment('振込口座ID');
            $table->smallInteger('entity_type')->comment('利用者タイプID: 3:事業者 4:法人');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人 ID');

            // ユーザー情報に関連するカラム
            $table->string('bank_name', 255)->comment('金融機関名: 暗号化');
            $table->string('branch_name', 255)->comment('支店名: 暗号化');
            $table->string('account_type', 255)->comment('口座種別: "1:普通預金口座 2:当座預金口座, 暗号化"');
            $table->string('account_number', 255)->comment('口座番号: 暗号化');
            $table->string('account_holder_name', 255)->comment('口座名義: カナ・暗号化');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
