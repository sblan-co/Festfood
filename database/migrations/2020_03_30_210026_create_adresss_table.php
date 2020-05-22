<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Comprobar la sintaxis actual

        Schema::create('adresss', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('street');
            $table->unsignedInteger('number');
            $table->unsignedInteger('floor');
            $table->string('apartment');
            $table->unsignedInteger('postcode');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresss');
    }
}
