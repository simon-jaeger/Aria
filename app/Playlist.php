<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model {
  protected $guarded = [];
  public $timestamps = false;

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function tracks() {
    return $this->belongsToMany(Track::class)
      ->withPivot('order')
      ->orderBy('pivot_order');
  }
}
