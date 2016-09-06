<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DnD5eCreateCharacterSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnd5e_character_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('character_name');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('alignment')->references('id')->on('dnd5e_alignments');
            $table->foreign('deity')->references('id')->on('dnd5e_deities');
            $table->foreign('race')->references('id')->on('dnd5e_races');
            $table->foreign('attributes')->references('id')->on('dnd5e_attributes_sheet');
            $table->foreign('skills')->references('id')->on('dnd5e_skills_sheet');
            $table->foreign('magic_attributes_sheet')->references('id')->on('dnd5e_magic_attributes_sheet');
            $table->string('flaws');
            $table->string('ideals');
            $table->string('description');
            $table->string('bonds');
            $table->string('languages');
            $table->foreign('proficiencies')->references('id')->on('dnd5e_proficiencies_sheet');
            $table->integer('max_hit_points');
            $table->integer('current_hit_points');
            $table->integer('proficiency_bonus');
            $table->foreign('saving_throws')->references('id')->on('dnd5e_saving_throws_sheet');
            $table->string('hit_dice');
            $table->foreign('abilities')->references('id')->on('dnd5e_abilities_sheet');
            $table->integer('copper_pieces');
            $table->integer('silver_pieces');
            $table->integer('gold_pieces');
            $table->integer('platinum_pieces');
            $table->integer('electrum_pieces');
            $table->integer('armor_class');
            $table->integer('speed');
            $table->integer('level');
            $table->integer('experience_points');
            $table->integer('initiative_bonus');
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
        Schema::drop('character_sheets_DnD5e');
    }
}
