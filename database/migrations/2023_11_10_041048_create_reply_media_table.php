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
        Schema::create('reply_media', function (Blueprint $table) {
            $table->comment('返信メディア');
            
            // IDや認証に関連するカラム
            $table->increments('media_id')->comment('メディアID');
            $table->integer('reply_id')->comment('返信ID');

            // ファイル情報に関連するカラム
            $table->string('file_type', 50)->comment('ファイルの種類: jpag, jpg, png, gif, mp4');
            $table->string('file_name', 255)->comment('ファイル名');
            $table->bigInteger('file_size')->nullable()->comment('ファイルサイズ: 画像:最大10MB, 動画:最大20MB');
            $table->integer('duration')->nullable()->comment('動画の長さ: 最大30秒');

            // 設定や状態に関連するフラグなど
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ: TRUE:削除済み FALSE:未削除, 画面から削除処理する場合は、物理削除"');

            // タイムスタンプ
            $table->softDeletes('deleted_at')->comment('削除日時');
            $table->timestamps();

             // 外部キー制約を設定
             $table->foreign('reply_id')->references('reply_id')->on('staff_replies')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_media');
    }
};
