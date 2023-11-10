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
        Schema::create('notifications', function (Blueprint $table) {
            $table->comment('お知らせ');
            
            // IDや認証に関連するカラム
            $table->increments('notification_id')->comment('お知らせID');

            // ユーザー情報に関連するカラム
            $table->smallInteger('entity_type')->comment('利用者タイプID: 1:投げ銭ユーザー, 2:スタッフ, 3:事業者, 4:法人');

            // お知らせ内容に関連するカラム
            $table->string('title', 50)->comment('タイトル');
            $table->text('content')->nullable()->comment('内容');
            $table->string('file_type', 50)->nullable()->comment('ファイルの種類: jpag, jpg, png, gif, pdf');
            $table->string('file_name', 255)->nullable()->comment('ファイル名');
            $table->bigInteger('file_size')->nullable()->comment('ファイルサイズ: 画像最大:10MB');

            // お知らせの掲載期間に関連するカラム
            $table->timestamp('start_at')->comment('掲載開始日時');
            $table->timestamp('end_at')->nullable()->comment('掲載終了日時');

            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
