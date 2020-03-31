<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// TODO: users should only be able to crud their own playlists
class PlaylistController extends Controller {
  public function index() {
    return Auth::user()
      ->playlists()
      ->with('tracks')
      ->orderBy('title', 'asc')
      ->get();
  }

  public function store(Request $req) {
    // create playlist
    $playlist = new Playlist([
      'title' => $req['title'],
      'slug' => $req['slug'],
    ]);
    Auth::user()->playlists()->save($playlist);

    // attach first track if provided
    if (count($req['tracks'])) {
      $playlist->tracks()->attach(
        $req['tracks'][0]['id'],
        ['order' => 1]
      );
    }

    return Playlist::with('tracks')->find($playlist->id);
  }

  public function update(Request $req, Playlist $playlist) {
    // update playlist record
    $playlist->title = $req['title'];
    $playlist->slug = $req['slug'];

    // update playlist_track pivot
    $newTracksIDs = collect($req['tracks'])
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
