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
        Schema::create('bank_account_changes', function (Blueprint $table) {
            $table->comment('振込口座変更');

            // IDや認証に関連するカラム
            $table->increments('change_id')->comment('振込口座変更ID');
            $table->integer('account_id')->comment('振込口座ID');
        
            // ユーザー情報に関連するカラム
            $table->string('prev_bank_name', 255)->nullable()->comment('変更前の金融機関名: 暗号化');
            $table->string('prev_branch_name', 255)->nullable()->comment('変更前の支店名: 暗号化');
            $table->string('prev_account_type', 255)->nullable()->comment('変更前の口座種別: 1:普通預金口座 2:当座預金口座, 暗号化');
            $table->string('prev_account_number', 255)->nullable()->comment('変更前の口座番号: 暗号化');
            $table->string('prev_account_holder_name', 255)->nullable()->comment('変更前の口座名義: 半角・カナ, 暗号化');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約の設定
            $table->foreign('account_id')->references('account_id')->on('bank_accounts')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_account_changes');
    }
};
