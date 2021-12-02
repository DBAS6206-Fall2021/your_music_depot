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
        
        Instrument::create(array(
            'name' => 'Guitar',
        ));
        Instrument::create(array(
            'name' => 'Drums',
        ));
        Instrument::create(array(
            'name' => 'Piano',
        ));
        Instrument::create(array(
            'name' => 'Violin',
        ));
        Instrument::create(array(
            'name' => 'Saxophone',
        ));
        Instrument::create(array(
            'name' => 'Trumpet',
        ));
        Instrument::create(array(
            'name' => 'Recorder',
        ));
        Instrument::create(array(
            'name' => 'Triangle',
        ));
    }
}