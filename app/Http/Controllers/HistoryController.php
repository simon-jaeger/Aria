<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

// TODO: users should only be able to crud their own history
class HistoryController extends Controller {
  public function show() {
    return History::find(1)->tracks()->get();
  }
}
