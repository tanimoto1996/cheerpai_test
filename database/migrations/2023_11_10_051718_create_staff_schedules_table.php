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
        Schema::create('staff_schedules', function (Blueprint $table) {
            $table->comment('スタッフスケジュール');
            
            // IDや認証に関連するカラム
            $table->increments('schedule_id')->comment('スケジュールID');
            $table->integer('staff_id')->comment('スタッフID');
    
            // ユーザー情報に関連するカラム
            $table->date('schedule_date')->comment('スケジュール年月日');
    
            // 設定や状態に関連するフラグなど
            $table->smallInteger('shift_status')->default(0)->comment('出勤フラグ: 0:未定 1:出勤 2:休み');
    
            // タイムスタンプ
            $table->timestamps();
    
            // 外部キー制約
            $table->foreign('staff_id')->references('staff_id')->on('staff')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_schedules');
    }
};
