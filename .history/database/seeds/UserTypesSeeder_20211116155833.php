<?php

use Illuminate\Database\Seeder;
use App\UserTypes;

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

        UserTypes::create(array(
            'type' => 'A',
        ));
        UserTypes::create(array(
            'type' => 'B',
        ));
        UserTypes::create(array(
            'type' => 'C',
        ));
    }
}
