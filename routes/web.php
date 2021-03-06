<?php
Route::redirect('/', '/register');
Route::view('/about', 'about');

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
Route::view('/player', 'player')->middleware('auth')->middleware('nocache');
Route::view('/player/{any}', 'player')
  ->where('any', '.*')
  ->middleware('auth')
  ->middleware('nocache');

// api (internal, authorized users only)
// -----------------------------------------------------------------------------
Route::prefix('api')
  ->middleware('auth')
  ->middleware('throttle:60,1')
  ->group(function () {
    Route::get('user', function () {
      return Auth::user();
    });

    Route::get('series', 'SeriesController@index');

    Route::get('playlists', 'PlaylistController@index');
    Route::post('playlists', 'PlaylistController@store');
    Route::put('playlists/{playlist}', 'PlaylistController@update');
    Route::delete('playlists/{playlist}', 'PlaylistController@destroy');

    Route::get('history', 'HistoryController@show');
    Route::put('history', 'HistoryController@update');
  });
