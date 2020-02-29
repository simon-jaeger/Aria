<?php

Route::get('/', function () {
  return view('index');
});

// auth
//------------------------------------------------------------------------------
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
  ->name('register');
Route::post('/register', 'Auth\RegisterController@register');

// player spa (defer to client side routing)
//------------------------------------------------------------------------------
Route::view('/player', 'player')->middleware('auth');
Route::view('/player/{any}', 'player')->where('any', '.*')->middleware('auth');

// api (internal, authorized users only)
// -----------------------------------------------------------------------------
Route::prefix('api')->middleware('auth')->group(function () {
  Route::get('user', function () {
    return Auth::user();
  });

  Route::get('series', 'SeriesController@index');
  Route::get('series/{slug}', 'SeriesController@show');

  Route::get('playlists', 'PlaylistController@index');
  Route::get('playlists/{slug}', 'PlaylistController@show');

  Route::get('history', 'HistoryController@show');
});
