<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charactersheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('characterName');
            $table->integer('player')->unsigned();
            $table->integer('campaign')->unsigned();
            $table->integer('system')->unsigned();
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
        Schema::drop('charactersheets');
    }
}
