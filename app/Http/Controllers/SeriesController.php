<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index() {
      return Series::orderBy('title')->get();
    }
}
