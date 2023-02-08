<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('phn');
            $table->string('phn2');
            $table->string('prefered_contact');
            $table->string('email');
            $table->string('address');
            $table->string('area');
            $table->string('city');
            $table->string('country');
            $table->string('service');
            $table->string('source');
            $table->string('time_to_call');
            $table->string('note');
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
        Schema::dropIfExists('persons');
    }
};
