<?php

use Illuminate\Database\Seeder;
use App\SkillLevel;

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
        
        SkillLevel::create(array(
            'description' => 'Novice',
        ));
        SkillLevel::create(array(
            'description' => 'Advanced Beginner',
        ));
        SkillLevel::create(array(
            'description' => 'Intermediate',
        ));
        SkillLevel::create(array(
            'description' => 'Proficient',
        ));
        SkillLevel::create(array(
            'description' => 'Master',
        ));
    }
}
