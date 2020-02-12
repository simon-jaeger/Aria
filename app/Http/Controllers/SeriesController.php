<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller {
  public function index() {
    return Series::with('tracks')->orderBy('title')->get();
  }
}
