<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

class HistoryController extends Controller {
  public function show() {
    return History::find(1)->tracks()->get();
  }
}
