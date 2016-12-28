<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnd5RacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_dnd5_races', function (Blueprint $table) {
            $table->increments('id');

            $table->string("name", 64);
            $table->integer("parent_race")->unsigned();
            $table->boolean("is_subrace");
            $table->string("description", 1024);
            $table->string("api_ai_key", 64);
            $table->string("ability_score_increase", 512); // actually JSON; JSON datatype is just poorly supported
            $table->string("age_description", 512);
            $table->string("alignment_description", 512);
            $table->integer("size_id");
            $table->string("size_description", 512);
            $table->integer("speed");
            $table->string("speed_description", 256);

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
        Schema::drop('static_dnd5_races');
    }
}
