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
    Schema::create('playlists', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('slug', 255);
      $table->string('title', 32);

      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

      $table->unique(['user_id', 'title']);
      $table->unique(['user_id', 'slug']);
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
