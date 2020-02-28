<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller {
  public function index() {
    return Playlist::withCount('tracks')->get();
  }

  public function show($slug) {
    return Playlist::with('tracks')->where('slug', '=', $slug)->firstOrFail();
  }
}
