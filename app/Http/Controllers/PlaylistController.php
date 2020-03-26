<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller {
  public function index() {
    return Playlist::with('tracks')->orderBy('title', 'asc')->get();
  }

  public function store() {
    // TODO: send whole playlist object like in update()?
    // TODO: add first track if provided
    $playlist = Playlist::create([
      'title' => request('title'),
      'slug' => request('slug'),
    ]);
    return Playlist::with('tracks')->find($playlist->id);
  }

  public function update(Playlist $playlist) {
    $newPlaylist = request('playlist');

    // update playlist record
    $playlist->title = $newPlaylist['title'];
    $playlist->slug = $newPlaylist['slug'];

    // update playlist_track pivot
    $newTracksIDs = collect($newPlaylist['tracks'])
      ->mapWithKeys(function ($x, $i) {
        // redefine pivot order for every track
        // to avoid holes and add new tracks to the end
        return [$x['id'] => ['order' => $i + 1]];
      });
    $playlist->tracks()->sync($newTracksIDs);

    $playlist->save();
  }

  public function destroy(Playlist $playlist) {
    /** @noinspection PhpUnhandledExceptionInspection */
    $playlist->delete();
  }
}
