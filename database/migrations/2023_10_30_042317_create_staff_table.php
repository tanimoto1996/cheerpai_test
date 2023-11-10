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
        Schema::create('staff', function (Blueprint $table) {
            $table->comment('スタッフ会員情報');
        
            // IDや認証に関連するカラム
            $table->increments('staff_id')->comment('スタッフID');
            $table->string('email', 255)->nullable()->unique()->comment('メールアドレス: 登録は任意（動物などを考慮）、暗号化');
            $table->string('password', 100)->nullable()->comment('パスワード');
            $table->rememberToken()->comment('持続ログイントークン');
        
            // ユーザー情報に関連するカラム
            $table->integer('business_id')->comment('事業者ID');
            $table->string('real_name', 50)->comment('本名: 事業者が認識できるように登録した時点のスタッフ名を登録。内部的に保持するため入力不要。編集不可。');
            $table->string('staff_name', 50)->comment('スタッフ名: 編集可能');
            $table->string('comment', 100)->nullable()->comment('一言コメント');
        
            // 設定や状態に関連するフラグなど
            $table->boolean('is_admin_staff')->default(false)->comment('管理スタッフフラグ: TRUE:管理者 FALSE:非管理者');
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ: TRUE:削除済み FALSE:未削除');
            $table->integer('points')->default(0)->comment('保有ポイント数');
            $table->smallInteger('ai_count')->default(3)->comment('AIメッセージ使用回数: MAX:3 MIN:0');
            $table->integer('admin_staff_id')->nullable()->comment('関連管理スタッフID: 管理してほしいstaff_idを登録。管理スタッフが削除した場合に削除(空)する。');
        
            // タイムスタンプ
            $table->softDeletes('deleted_at')->comment('削除日時');
            $table->timestamps();
        
            // 外部キー制約の設定
            $table->foreign('business_id')->references('business_id')->on('business_operators')->onDelete('restrict'); // 親レコードを削除しようとするとエラーが発生する
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
