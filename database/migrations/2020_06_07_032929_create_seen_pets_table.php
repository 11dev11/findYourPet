<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeenPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seen_pets', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('chipNumber')->unique()->nullable();

            $table->integer('city_id');
            $table->string('city');

            $table->integer('township_id')->nullable();
            $table->string('township')->nullable();
            
            $table->string('street')->nullable();

            $table->integer('animal_id');
            $table->string('animal');

            $table->integer('breed_id')->nullable();
            $table->string('breed')->nullable();

            $table->string('sex_id')->nullable();
            $table->string('sex')->nullable();

            $table->string('size')->nullable();

//reminder! podesi not nullable za psa kroz kontroler

            $table->string('furColor')->nullable();

            $table->string('furColor2')->nullable();

            $table->string('eyeColor')->nullable();

            $table->integer('castratedOrSterialized')->nullable();

            $table->integer('movedFromStreet')->nullable();
            $table->string('mover')->nullable();
            $table->string('moverPhone')->nullable();
            $table->string('moverEmail')->nullable();

            $table->string('braceletColor')->nullable();

            $table->integer('disability')->nullable();
     
            $table->string('imagesURL');

            $table->integer('user_id');
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
        Schema::dropIfExists('seen_pets');
    }
}
