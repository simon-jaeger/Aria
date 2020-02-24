<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller {
  public function index() {
    return Series::withCount('tracks')->orderBy('title')->get();
  }

  public function show($slug) {
    return Series::with('tracks')->where('slug', '=', $slug)->firstOrFail();
  }
}
