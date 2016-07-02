<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('song_id')->unsigned()->nullable();
            $table->integer('tag_id')->unsigned()->nullable();

            $table->foreign('song_id')->references('id')->on('songs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('song_tag');
    }
}
