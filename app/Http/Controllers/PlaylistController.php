<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller {
  public function index() {
    return Playlist::with('tracks')->orderBy('title', 'asc')->get();
  }

  public function store() {
    // TODO: add first track if provided
    $playlist = Playlist::create([
      'title' => request('title'),
      'slug' => request('slug'),
    ]);
    return Playlist::with('tracks')->find($playlist->id);
  }

  public function update() {

  }

  public function destroy(Playlist $playlist) {
    /** @noinspection PhpUnhandledExceptionInspection */
    $playlist->delete();
  }
}
