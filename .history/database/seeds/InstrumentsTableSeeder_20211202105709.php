<?php

use Illuminate\Database\Seeder;
use App\Instrument;
class InstrumentsTableSeeder extends Seeder
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
            'name' => 'Piano',
        ));
        Instrument::create(array(
            'name' => 'Vocal',
        ));
        Instrument::create(array(
            'name' => 'Guitar',
        ));
        Instrument::create(array(
            'name' => 'Percussion',
        ));
        Instrument::create(array(
            'name' => 'Brass',
        ));
        Instrument::create(array(
            'name' => 'Wind',
        ));
    }
}