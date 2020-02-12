<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model {
  public $timestamps = false;

  public function tracks() {
    return $this->hasMany(Track::class)->orderBy('order');
  }
}
