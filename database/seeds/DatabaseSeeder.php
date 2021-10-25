<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoomTypesSeeder::class);
        $this->command->info('room_types table seeded!');

        $this->call(UserTypesSeeder::class);
        $this->command->info('user_types table seeded!');

        $this->call(SkillLevelsSeeder::class);
        $this->command->info('skill_levels table seeded!');
    }
}
