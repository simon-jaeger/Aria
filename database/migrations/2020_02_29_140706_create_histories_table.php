<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('histories', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('user_id');

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
    });


    Schema::create('history_track', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('history_id');
      $table->unsignedBigInteger('track_id');
      $table->timestamp('created_at', 0);

      $table->foreign('history_id')
        ->references('id')
        ->on('histories')
        ->onDelete('cascade');
      $table->foreign('track_id')
        ->references('id')
        ->on('tracks')
        ->onDelete('cascade');
    });

    // TODO: link histories to users (fix controller too)
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('histories');
    Schema::dropIfExists('history_track');
  }
}
