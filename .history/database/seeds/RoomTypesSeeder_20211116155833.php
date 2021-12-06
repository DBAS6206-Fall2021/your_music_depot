<?php

use Illuminate\Database\Seeder;
use App\RoomTypes;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->delete();

        RoomTypes::create(array(
            'type' => 'A',
        ));
        RoomTypes::create(array(
            'type' => 'B',
        ));
        RoomTypes::create(array(
            'type' => 'C',
        ));
    }
}
