<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->delete();
        
        // Individual rooms
        Room::create(array(
            'room_number' => 201,
            'room_type_id' => 1,
            'capacity' => 1,
        ));
        Room::create(array(
            'room_number' => 202,
            'room_type_id' => 1,
            'capacity' => 1,
        ));
        Room::create(array(
            'room_number' => 203,
            'room_type_id' => 1,
            'capacity' => 1,
        ));
        Room::create(array(
            'room_number' => 204,
            'room_type_id' => 1,
            'capacity' => 1,
        ));

        // Group rooms with pianos
        Room::create(array(
            'room_number' => 101,
            'room_type_id' => 3,
            'capacity' => 6,
        ));
        Room::create(array(
            'room_number' => 102,
            'room_type_id' => 3,
            'capacity' => 6,
        ));

        // non-piano group rooms
        Room::create(array(
            'room_number' => 103,
            'room_type_id' => 2,
            'capacity' => 4,
        ));
    }
}
