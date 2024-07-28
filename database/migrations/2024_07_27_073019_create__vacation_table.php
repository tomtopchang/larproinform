<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacation', function (Blueprint $table) {
            $table->id();
            $table->string('pno',20); //員編
            $table->string('cname',20); //姓名
            $table->string('vtype',20); //假單類別
            $table->timestamp('vsday'); //休假起日
            $table->timestamp('veday'); //休假迄日
            $table->integer('sumday'); //休假天數
            $table->integer('sumhour'); //休假分鐘
            $table->string('reason',150); //休假事由
            $table->string('memo',150)->nullable(); //備註
            $table->string('depcheck',150)->nullable(); //單位主管審核
            $table->timestamp('deptime')->nullable(); //單位主管審核時間
            $table->string('peocheck',150)->nullable(); //人事室審核
            $table->timestamp('peotime')->nullable(); //人事室審核時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacation');
    }
}
