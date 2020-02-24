<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model {
  public $timestamps = false;

  public function tracks() {
    return $this->belongsToMany(Track::class);
  }
}
