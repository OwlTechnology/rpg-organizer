<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDndCharacterPersonalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dndPersonality', function (Blueprint $table) {
            $table->increments('id');
            $table->string('personality_traits');
            $table->string('ideals');
            $table->string('bonds');
            $table->string('flaws');
            $table->integer('alignmentID')->unsigned();
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
        Schema::drop('dndPersonality');
    }
}
