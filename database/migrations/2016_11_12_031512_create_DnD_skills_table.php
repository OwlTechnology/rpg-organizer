<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnDSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnd_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("characterId")->unsigned();
            $table->boolean("isProficient");
            $table->string("name");
            $table->float("proficiencyMultiplier");
            $table->integer("baseAttribute");
            $table->integer("temporaryModifier");

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
        Schema::drop('dnd_skills');
    }
}
