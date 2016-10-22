<?php

use Illuminate\Database\Seeder;

class DnDAlignmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Adds alignments to the dndAlignments table
        DB::table('dndAlignments')->insert([
            "name" => "Lawful Good"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Lawful Neutral"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Lawful Evil"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Neutral Good"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "True Neutral"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Neutral Evil"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Chaotic Good"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Chaotic Neutral"
        ]);
        DB::table('dndAlignments')->insert([
            "name" => "Chaotic Evil"
        ]);
    }
}
