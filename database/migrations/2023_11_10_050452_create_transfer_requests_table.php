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
        Schema::create('transfer_requests', function (Blueprint $table) {
            $table->comment('振込申請');

            // IDや認証に関連するカラム
            $table->increments('request_id')->comment('振込申請ID');
            $table->integer('entity_type')->comment('利用者タイプID: 3:事業者 4:法人');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人 ID');

            // 設定や状態に関連するフラグなど
            $table->integer('request_status')->comment('振込申請ステータス: 1:振込済み、2:未振込 3:キャンセル、管理者が振込代行会社に振込手続きをしたタイミングで更新');

            // 金額関連のカラム（属性に応じて適切な型を指定）
            $table->string('notification_number', 10)->comment('支払通知番号: 000000001、000000002など');
            $table->decimal('transfer_request_amount', 10, 2)->comment('振込申請時金額: 例）2000');
            $table->decimal('payment_fee_rate', 5, 2)->comment('決済手数料: 例）3.6%');
            $table->decimal('usage_fee_rate', 5, 2)->comment('利用料: 例）20%');
            $table->decimal('transfer_fee_amount', 5, 2)->comment('振込手数料: 例）316');
            $table->decimal('transfer_amount', 10, 2)->comment('振込金額: 例）1228');
            $table->string('transaction_period')->comment('取引期間');

            // 銀行関連のカラム
            $table->string('confirm_bank_name', 255)->comment('振込確定時点の金融機関名: 暗号化');
            $table->string('confirm_branch_name', 255)->comment('振込確定時点の支店名: 暗号化');
            $table->string('confirm_account_type', 255)->comment('振込確定時点の口座種別: 1:普通預金口座 2:当座預金口座, 暗号化');
            $table->string('confirm_account_number', 255)->comment('振込確定時点の口座番号: 暗号化');
            $table->string('confirm_account_holder_name', 255)->comment('振込確定時点の口座名義: 暗号化');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_requests');
    }
};
