<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->string('pno',20);  //員編
            $table->string('cname',50); //姓名
            $table->string('idno',50); //身分證號碼
            $table->timestamp('birsday')->nullable(); //生日
            $table->string('sex',2)->nullable(); //性別
            $table->string('address',100)->nullable(); //地址
            $table->string('tel',20)->nullable(); //電話
            $table->string('depname',50)->nullable(); //部門
            $table->string('jobname',50)->nullable();// 職稱
            $table->timestamp('inday')->nullable(); //到職日
            $table->timestamp('outday')->nullable(); //離職日
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel');
    }
}
