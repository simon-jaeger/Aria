<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
  use Notifiable;

  protected $fillable = ['email', 'password',];
  protected $hidden = ['password', 'remember_token',];
  protected $casts = ['email_verified_at' => 'datetime',];

  public function history() {
    return $this->hasOne(History::class);
  }

  public function playlists() {
    return $this->hasMany(Playlist::class);
  }
}
