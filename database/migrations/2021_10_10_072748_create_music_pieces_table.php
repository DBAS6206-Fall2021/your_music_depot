<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_pieces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skill_level_id');
            $table->string('title');
            $table->timestamps();

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
        Schema::dropIfExists('music_pieces');
    }
}
