<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeruserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peruser', function (Blueprint $table) {
            $table->id();
            $table->string('account',50); //帳號
            $table->string('password'); //密碼
            $table->string('name',50); //名稱
            $table->string('email'); //email
            $table->string('unit'); //單位
            $table->integer('role'); //權限
            $table->timestamp('created_at'); //建立日期
            $table->timestamp('edit_at')->nullable(); //修改日期
            $table->timestamp('del_at')->nullable();  //刪除日期
            $table->timestamp('last_login')->nullable(); //登入日期
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peruser');
    }
}
