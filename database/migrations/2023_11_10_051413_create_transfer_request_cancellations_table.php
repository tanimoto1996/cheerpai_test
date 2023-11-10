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
        Schema::create('transfer_request_cancellations', function (Blueprint $table) {
            $table->comment('振込申請取り消し');

            // IDや認証に関連するカラム
            $table->increments('request_cancel_id')->comment('振込取り消しID');
            
            // ユーザー情報に関連するカラム
            $table->integer('request_id')->comment('振込申請ID');
            $table->string('cancel_reason')->comment('取り消し理由');
        
            // タイムスタンプ
            $table->timestamps();
        
            // 外部キー制約
            $table->foreign('request_id')->references('request_id')->on('transfer_requests')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_request_cancellations');
    }
};
