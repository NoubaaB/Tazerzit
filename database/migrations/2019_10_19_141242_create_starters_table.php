<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('prix')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('display')->default(0);
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
        Schema::dropIfExists('starters');
    }
}
