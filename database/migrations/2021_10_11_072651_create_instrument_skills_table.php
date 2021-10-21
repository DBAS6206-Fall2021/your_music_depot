<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('instrument_id');
            $table->unsignedBigInteger('skill_level_id');
            $table->integer('practice_hours');

            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->foreign('skill_level_id')->references('id')->on('skill_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrument_skills');
    }
}
