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
		Schema::create('business_operators', function (Blueprint $table) {
		    $table->comment('事業者会員情報');

			// IDや認証に関連するカラム
			$table->increments('business_id')->comment('事業者ID');
			$table->string('email', 255)->unique()->comment('メールアドレス: 半角・英数記, 暗号化');
			$table->string('password', 100)->nullable()->comment('パスワード: 半角・英数');
			$table->rememberToken()->comment('持続ログイントークン');

			// ユーザー情報に関連するカラム
			$table->unsignedInteger('corporation_id')->nullable()->comment('法人ID');
			$table->unsignedInteger('business_application_id')->comment('事業者申込申請ID');
			$table->string('corporation_name', 100)->nullable()->comment('法人名');
			$table->string('applicant_name', 255)->nullable()->comment('申込者氏名: 暗号化');
			$table->string('applicant_name_kana', 255)->nullable()->comment('申込者氏名（カナ）: 暗号化');
			$table->string('business_name', 100)->comment('事業者名');
			$table->string('zip_code', 7)->comment('郵便番号: zipcloud利用');
			$table->string('pref_code', 2)->comment('都道府県コード: 定数ファイル参照(1~47)');
			$table->string('city', 200)->comment('市区町村');
			$table->string('phone', 255)->comment('電話番号: 暗号化');
			$table->string('invoice_reg_num', 255)->comment('適格請求書発行事業者登録番号: 暗号化');
			$table->string('business_form', 50)->nullable()->comment('事業形態');
			$table->string('business_description', 300)->nullable()->comment('事業者説明');
			$table->integer('first_desk_number')->nullable()->comment('卓番号１: ショップQRコード生成時に必要');
			$table->integer('second_desk_number')->nullable()->comment('卓番号２: ショップQRコード生成時に必要');

			// 設定や状態に関連するフラグなど
			$table->smallInteger('business_status')->default(2)->comment('事業者ステータス: 1稼働, 2停止, 3休業');
			$table->boolean('is_deleted')->default(false)->comment('削除フラグ: TRUE:削除済み FALSE:未削除');

			// タイムスタンプ
			$table->softDeletes()->comment('削除日時');
			$table->timestamps();

			// 外部キー制約
			$table->foreign('corporation_id')->references('corporation_id')->on('corporations')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
			$table->foreign('business_application_id')->references('business_application_id')->on('business_applications')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_operators');
    }
};
