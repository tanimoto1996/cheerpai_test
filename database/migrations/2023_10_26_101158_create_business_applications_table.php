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
        Schema::create('business_applications', function (Blueprint $table) {
            $table->comment('法人申込申請');

            // IDや認証に関連するカラム
            $table->increments('business_application_id')->comment('事業者申込ID');
            $table->string('email', 255)->unique()->comment('事業者メールアドレス: 暗号化');
        
            // ユーザー情報に関連するカラム
            $table->integer('corporation_application_id')->nullable()->comment('法人ID: 親法人が存在する場合に必要');
            $table->string('corporation_name', 100)->nullable()->comment('法人名');
            $table->string('applicant_name', 255)->nullable()->comment('申込者氏名: 暗号化');
            $table->string('applicant_name_kana', 255)->nullable()->comment('申込者氏名（カナ）: 暗号化');
            $table->string('business_name', 100)->comment('事業者名');
            $table->string('zip_code', 7)->comment('郵便番号: zipcloud利用');
            $table->string('pref_code', 2)->comment('都道府県コード: 定数ファイル参照(1~47)');
            $table->string('city', 200)->comment('市区町村');
            $table->string('phone', 255)->comment('事業者電話番号: 暗号化');
            $table->string('invoice_reg_num', 255)->nullable()->comment('適格請求書発行事業者登録番号: 暗号化');
            $table->string('business_form', 50)->nullable()->comment('事業形態');
            $table->text('notes')->nullable()->comment('備考');
        
            // 設定や状態に関連するフラグなど
            $table->smallInteger('application_status')->default(1)->comment('申込状況: 1:審査中、2:許可済み、3:否認済み');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約の追加
            $table->foreign('corporation_application_id')->references('corporation_application_id')->on('corporation_applications')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_applications');
    }
};
