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

  public function update(Playlist $playlist) {
    if (request()->has('title')) {
      $playlist->title = request('title');
      $playlist->slug = request('slug');
    }
    if (request()->has('track')) {
      $order = $playlist->tracks()->count() + 1;
      $playlist->tracks()->attach(request('track')['id'], ['order' => $order]);
    }
    $playlist->save();
  }

  public function destroy(Playlist $playlist) {
    /** @noinspection PhpUnhandledExceptionInspection */
    $playlist->delete();
  }
}
