<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_number');
            $table->unsignedBigInteger('instrument_id');
            $table->unsignedBigInteger('lesson_type_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('room_number')->references('id')->on('rooms');
            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->foreign('lesson_type_id')->references('id')->on('lesson_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
