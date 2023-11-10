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
        Schema::create('login_histories', function (Blueprint $table) {
            $table->comment('ログイン履歴');

            // IDや認証に関連するカラム
            $table->increments('login_history_id')->comment('ログイン履歴ID');

            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ 3:事業者 4:法人');
            $table->integer('entity_id')->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人のID');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_successful')->comment('成功/失敗: TRUE:成功、FALSE:失敗');

            // タイムスタンプ
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_histories');
    }
};
