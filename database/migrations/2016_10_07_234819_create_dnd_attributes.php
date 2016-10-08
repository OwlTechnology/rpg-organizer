<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDndAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnd_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->integer('charactersheetID')->unsigned();
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
        Schema::drop('dnd_attributes');
    }
}
