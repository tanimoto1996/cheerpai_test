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
        Schema::create('corporations', function (Blueprint $table) {
            $table->comment('法人会員情報');
            
            // IDや認証に関連するカラム
            $table->increments('corporation_id')->comment('法人ID');
            $table->string('email', 255)->unique()->comment('法人メールアドレス: 暗号化');
            $table->string('password', 100)->comment('法人パスワード');
            $table->rememberToken()->comment('持続ログイントークン');
        
            // ユーザー情報に関連するカラム
            $table->integer('corporation_application_id')->nullable()->comment('法人申込申請ID');
            $table->string('corporation_name', 100)->comment('法人名');
            $table->string('applicant_name', 255)->comment('申込者氏名: 暗号化');
            $table->string('applicant_name_kana', 255)->comment('申込者氏名（カナ）: 暗号化');
            $table->string('zip_code', 7)->comment('郵便番号: zipcloud利用');
            $table->string('pref_code', 2)->comment('都道府県コード: 定数ファイル参照(1~47)');
            $table->string('city', 200)->comment('市区町村');
            $table->string('phone', 255)->comment('法人電話番号: 暗号化');
            $table->string('invoice_reg_num', 255)->comment('適格請求書発行事業者登録番号: 暗号化');
            $table->text('notes')->nullable()->comment('備考');
        
            // 設定や状態に関連するフラグなど
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ: TRUE:削除済み FALSE:未削除');
        
            // タイムスタンプ
            $table->softDeletes('deleted_at')->comment('削除日時');
            $table->timestamps();
        
            // 外部キー制約
            $table->foreign('corporation_application_id')->references('corporation_application_id')->on('corporation_applications')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporations');
    }
};
