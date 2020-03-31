<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// TODO: users should only be able to crud their own history
class HistoryController extends Controller {
  public function show() {
    return Auth::user()->history->tracks()->get();
  }

  public function update(Request $req) {
    $history = Auth::user()->history;

    // prevent illegal action of adding more than 100 entries
    if (collect($req)->count() > 100) {
      return abort(400, 'History may not hold more than 100 entries');
    }

    // clear history, then sync with payload history
    $history->tracks()->detach();
    $history->tracks()->attach(collect($req)->pluck('id'));
  }
}
