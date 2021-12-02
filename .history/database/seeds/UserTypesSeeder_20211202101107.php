<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->delete();

        UserType::create(array(
            'type' => 'M',
        ));
        UserType::create(array(
            'type' => 'I',
        ));
        UserType::create(array(
            'type' => 'C',
        ));
    }
}
