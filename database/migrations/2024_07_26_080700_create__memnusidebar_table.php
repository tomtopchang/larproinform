<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemnusidebarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memnusidebar', function (Blueprint $table) {
            $table->id();
            $table->string('name',50); //功能表名稱
            $table->integer('nav'); //上層編號
            $table->string('item',100)->nullable(); //url
            $table->string('icon',100)->nullable(); //圖像參數
            $table->integer('sort'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memnusidebar');
    }
}
