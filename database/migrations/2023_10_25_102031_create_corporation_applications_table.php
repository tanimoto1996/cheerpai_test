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
        Schema::create('corporation_applications', function (Blueprint $table) {
            $table->comment('法人申込申請');

            // IDや認証に関連するカラム
            $table->increments('corporation_application_id')->comment('法人申込ID');
            $table->string('email', 255)->unique()->comment('法人メールアドレス: 暗号化');
        
            // ユーザー情報に関連するカラム
            $table->string('corporation_name', 100)->comment('法人名');
            $table->string('applicant_name', 255)->comment('申込者氏名: 暗号化');
            $table->string('applicant_name_kana', 255)->comment('申込者氏名（カナ）: 暗号化');
            $table->string('zip_code', 7)->comment('郵便番号');
            $table->string('pref_code', 2)->comment('都道府県');
            $table->string('city', 200)->comment('市区町村');
            $table->string('phone', 255)->comment('法人電話番号: 暗号化');
            $table->string('invoice_reg_num', 255)->comment('適格請求書発行事業者登録番号: 暗号化');
        
            // 設定や状態に関連するフラグなど
            $table->smallInteger('application_status')->default(1)->comment('申込状況: 1:審査中、2:許可済み、3:否認済み');
        
            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporation_applications');
    }
};
