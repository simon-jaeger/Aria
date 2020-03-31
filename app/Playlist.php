<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

  // only resolve the user's own playlists
  // trying to access another user's playlist fails
  public function resolveRouteBinding($value, $field = null) {
    return Auth::user()->playlists()->where('id', $value)->firstOrFail();
  }
}
