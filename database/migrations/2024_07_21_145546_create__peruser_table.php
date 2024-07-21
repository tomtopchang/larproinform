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
            $table->string('account',50);
            $table->string('password');
            $table->string('name',50);
            $table->string('email');
            $table->timestamp('created_at');
            $table->timestamp('edit_at')->nullable();
            $table->timestamp('last_login')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_peruser');
    }
}
