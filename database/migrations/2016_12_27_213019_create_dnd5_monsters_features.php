<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnd5MonstersFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_dnd5_monsters_features', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("monster_id")->unsigned();
            $table->string("name", 128);
            $table->string("description", 1024);

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
        Schema::drop('static_dnd5_monsters_features');
    }
}
