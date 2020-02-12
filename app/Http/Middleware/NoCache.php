<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// appends headers to the response that avoid caching
class NoCache {
  public function handle($request, Closure $next) {
    $response = $next($request);
    return $response->withHeaders([
      'Cache-Control' => 'no-store, no-cache, must-revalidate',
      'Pragma' => 'no-cache',
      'Expires' => '0'
    ]);
  }
}
