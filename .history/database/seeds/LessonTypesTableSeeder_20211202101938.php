<?php

use Illuminate\Database\Seeder;
use App\LessonType;

class LessonTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_types')->delete();
        
        LessonType::create(array(
            'type' => 'Individual',
        ));
        LessonType::create(array(
            'type' => 'Group',
        ));
    }
}