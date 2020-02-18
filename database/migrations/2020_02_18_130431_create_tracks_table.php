<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('tracks', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('order');
      $table->string('title');
      $table->string('duration');
      $table->string('file');
      $table->boolean('is_hidden')->default(false);

      $table->unsignedBigInteger('series_id');
      $table->foreign('series_id')->references('id')->on('series');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('tracks');
  }
}
