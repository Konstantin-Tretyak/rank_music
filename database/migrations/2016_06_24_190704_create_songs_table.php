<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_song');
            $table->integer('year')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('genre_id')->unsigned()->nullable();
            $table->integer('performer_id')->unsigned()->nullable();
            $table->integer('composer_id')->unsigned()->nullable();
            $table->integer('rank_count')->unsigned()->default(0);
            $table->float('rank')->unsigned()->default(0);
            $table->integer('place_in_rank')->unsigned()->default(0);
            $table->integer('listens_count')->unsigned()->default(0);
            $table->string('video_youtube_id')->nullable();
            $table->string('text')->nullable();

            $table->timestamps();

            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('performer_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('composer_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('songs');
    }
}
