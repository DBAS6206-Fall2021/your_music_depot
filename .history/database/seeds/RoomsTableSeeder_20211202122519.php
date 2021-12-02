<?php

use Illuminate\Database\Seeder;
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
        DB::table('instruments')->delete();
        
        Room::create(array(
            'room_number' => 'Guitar',
            'room_type_id' => 'Guitar',
            'capacity' => 'Guitar',
        ));
        Room::create(array(
            'name' => 'Drums',
        ));
        Room::create(array(
            'name' => 'Piano',
        ));
        Room::create(array(
            'name' => 'Violin',
        ));
        Room::create(array(
            'name' => 'Saxophone',
        ));
        Room::create(array(
            'name' => 'Trumpet',
        ));
        Room::create(array(
            'name' => 'Recorder',
        ));
        Room::create(array(
            'name' => 'Triangle',
        ));
    }
}