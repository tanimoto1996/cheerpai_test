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
        Schema::create('ng_words', function (Blueprint $table) {
            $table->comment('NGワード');

            // IDや認証に関連するカラム
            $table->increments('word_id')->comment('NGワードID');

            // ユーザー情報に関連するカラム
            $table->string('word', 255)->comment('NGワード');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ng_words');
    }
};
