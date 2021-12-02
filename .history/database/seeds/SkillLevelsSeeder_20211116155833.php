<?php

use Illuminate\Database\Seeder;
use App\SkillLevels;

class SkillLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_levels')->delete();
        
        SkillLevels::create(array(
            'description' => 'Novice',
        ));
        SkillLevels::create(array(
            'description' => 'Advanced Beginner',
        ));
        SkillLevels::create(array(
            'description' => 'Intermediate',
        ));
        SkillLevels::create(array(
            'description' => 'Proficient',
        ));
        SkillLevels::create(array(
            'description' => 'Master',
        ));
    }
}
