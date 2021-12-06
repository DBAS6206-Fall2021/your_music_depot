<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\RoomType;

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

        RoomType::create(array(
            'type' => 'A',
        ));
        RoomType::create(array(
            'type' => 'B',
        ));
        RoomType::create(array(
            'type' => 'C',
        ));
    }
}
