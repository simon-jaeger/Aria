<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model {
  public $timestamps = false;

  public function series() {
    return $this->belongsTo(Series::class);
  }

  public function playlists() {
    return $this->belongsToMany(Playlist::class);
  }

  public function histories() {
    return $this->belongsToMany(History::class);
  }
}
