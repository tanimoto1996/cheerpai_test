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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->comment('お問い合わせ');

            // IDや認証に関連するカラム
            $table->increments('inquiry_id')->comment('お問い合わせID');
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー 2:スタッフ 3:事業者 4:法人 5:全体');
            $table->integer('entity_id')->nullable()->comment('利用者ID: 投げ銭ユーザー/スタッフ/事業者/法人 ID');

            // ユーザー情報に関連するカラム
            $table->string('email', 255)->comment('メールアドレス: 暗号化');
            $table->text('content')->comment('内容');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_reply')->default(false)->comment('返信状況: TRUE:未返信 FALSE:返信済み');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
