<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnd5MonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_dnd5_monsters', function (Blueprint $table) {
            $table->increments('id');

            $table->string("name", 128);
            $table->string("classification", 64);
            $table->integer("alignment_id")->unsigned();
            $table->integer("armor_class");
            $table->integer("hit_points");
            $table->string("hit_points_calculation", 32);
            $table->integer("speed");
            $table->integer("speed_swim");
            $table->integer("base_strength");
            $table->integer("base_dexterity");
            $table->integer("base_constitution");
            $table->integer("base_intelligence");
            $table->integer("base_wisdom");
            $table->integer("base_charisma");
            $table->json("saving_throws");
            $table->json("skills");
            $table->json("senses");
            $table->json("languages");
            $table->integer("challenge_rating");
            $table->integer("average_exp");
            $table->json("features");
            $table->string("legendary_actions_description", 1024);
            $table->json("legendary_actions");
            $table->json("damage_resistances");
            $table->json("condition_immunities");

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
        Schema::drop('static_dnd5_monsters');
    }
}
