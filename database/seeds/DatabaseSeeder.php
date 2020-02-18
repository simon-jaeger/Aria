<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    // TODO: test user, remove later
    \App\User::create([
      'email' => 'a@b',
      'password' => '$2y$10$ofiQGeXPluKG45u62i7.K.PuJArQUXgyY5Adu1EyJKM0zMcrO.MSO', // p
    ]);

    // TODO: test series, remove later
    \App\Series::create([
      'title' => 'Celeste',
      'title_short' => 'Celeste',
      'cover' => 'celeste.jpg',
    ]);
    \App\Series::create([
      'title' => 'Doki Doki Literature Club',
      'title_short' => 'DDLC',
      'cover' => 'doki-doki-literature-club.jpg',
    ]);
    \App\Series::create([
      'title' => 'Final Fantasy',
      'title_short' => 'Final Fantasy',
      'cover' => 'final-fantasy.jpg',
    ]);
    \App\Series::create([
      'title' => 'Hypderdimension Neptunia',
      'title_short' => 'Neptunia',
      'cover' => 'hypderdimension-neptunia.jpg',
    ]);
    \App\Series::create([
      'title' => 'Zelda, The legend of',
      'title_short' => 'Zelda',
      'cover' => 'zelda-the-legend-of.jpg',
    ]);
    \App\Series::create([
      'title' => 'Ar Tonelico',
      'title_short' => 'Ar Tonelico',
      'cover' => 'ar-tonelico.jpg',
    ]);
  }
}
