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
            $tables->string('languages');
            $table->foreign('proficiencies')->references('id')->on('dnd5e_proficiencies_sheet');
            $table->int('max_hit_points');
            $table->int('current_hit_points');
            $table->int('proficiency_bonus');
            $table->foreign('saving_throws')->references('id')->on('dnd5e_saving_throws_sheet');
            $table->string('hit_dice');
            $table->foreign('abilities')->references('id')->on('dnd5e_abilities_sheet');
            $table->int('copper_pieces');
            $table->int('silver_pieces');
            $table->int('gold_pieces');
            $table->int('platinum_pieces');
            $table->int('electrum_pieces');
            $table->int('armor_class');
            $table->int('speed');
            $table->int('level');
            $table->int('experience_points');
            $table->int('initiative_bonus');
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
