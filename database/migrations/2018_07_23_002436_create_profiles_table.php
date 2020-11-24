<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->unsignedSmallInteger('number_in_family'); // size of family
            $table->string('rent_or_own'); // this will by checkbox
            $table->boolean('yard'); // this will be yes or no
            $table->unsignedSmallInteger('pets_in_family'); //this will be number of pets
            // this fields can be added more than once
            $table->string('pet_photo'); //this will the name of the uploadable image link
            $table->string('breed');
            $table->unsignedSmallInteger('age_of_pet');

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
        Schema::dropIfExists('profiles');
    }
}
