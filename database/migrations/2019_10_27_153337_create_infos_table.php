<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->text('story');
            $table->text('menu');
            $table->string('adress');
            $table->string('openDays');
            $table->string('time');
            $table->text('about');
            $table->text('phoneText');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}
