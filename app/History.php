<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model {
  public $timestamps = false;
  
  public function user() {
    return $this->belongsTo(User::class);
  }

  public function tracks() {
    return $this->belongsToMany(Track::class)
      ->withPivot('created_at')
      ->orderBy('created_at', 'desc');
  }
}
