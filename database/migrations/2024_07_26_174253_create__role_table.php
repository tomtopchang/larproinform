<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at'); //建立日期
            $table->timestamp('edit_at')->nullable(); //修改日期
            $table->timestamp('del_at')->nullable(); //刪除日期
            $table->string('name',50); //名稱
            $table->string('role',255); //權限列表
            $table->string('remark',255)->nullable();; //備註
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
