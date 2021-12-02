<?php

use Illuminate\Database\Seeder;

class InstrumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        public function run()
    {
        DB::table('instruments')->delete();
        
        SkillLevels::create(array(
            'name' => 'Guitar',
        ));
        SkillLevels::create(array(
            'name' => 'Drums',
        ));
        SkillLevels::create(array(
            'name' => 'Piano',
        ));
        SkillLevels::create(array(
            'name' => 'Violin',
        ));
        SkillLevels::create(array(
            'name' => 'Saxophone',
        ));
        SkillLevels::create(array(
            'name' => 'Trumpet',
        ));
        SkillLevels::create(array(
            'name' => 'Recorder',
        ));
        SkillLevels::create(array(
            'name' => 'Triangle',
        ));
    }
}