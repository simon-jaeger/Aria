<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;

// TODO: find users history instead of hardcoding history with id 1
// TODO: users should only be able to crud their own history
class HistoryController extends Controller {
  public function show() {
    return History::find(1)->tracks()->get();
  }

  public function update(Request $req) {
    $history = History::find(1);

    // prevent illegal action of adding more than 100 entries
    if (collect($req)->count() > 100) {
      return abort(400, 'History may not hold more than 100 entries');
    }

    // clear history, then sync with payload history
    $history->tracks()->detach();
    $history->tracks()->attach(collect($req)->pluck('id'));
  }
}
