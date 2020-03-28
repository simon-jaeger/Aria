<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    // TODO: link playlists to users (fix controller too)

    // TODO: slug and title only unique for that user!
    //       two users can have playlists with the same title/slug!

    Schema::create('playlists', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('slug', 255)->unique();
      $table->string('title', 32)->unique();
    });

    Schema::create('playlist_track', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('playlist_id');
      $table->unsignedBigInteger('track_id');
      $table->integer('order');
      $table->unique(['playlist_id', 'track_id']);

      $table->foreign('playlist_id')
        ->references('id')
        ->on('playlists')
        ->onDelete('cascade');
      $table->foreign('track_id')
        ->references('id')
        ->on('tracks')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('playlists');
    Schema::dropIfExists('playlist_track');
  }
}
