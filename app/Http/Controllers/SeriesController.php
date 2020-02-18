<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller {
  public function index() {
    return Series::withCount('tracks')->orderBy('title')->get();
  }

  public function show($id) {
    return Series::with('tracks')->findOrFail($id);
  }
}
