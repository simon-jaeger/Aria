<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $faker = Faker\Factory::create();

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
      'title' => 'Zelda, The Legend of',
      'title_short' => 'Zelda',
      'cover' => 'zelda-the-legend-of.jpg',
    ]);
    \App\Series::create([
      'title' => 'Ar Tonelico',
      'title_short' => 'Ar Tonelico',
      'cover' => 'ar-tonelico.jpg',
    ]);

    // TODO: test tracks, remove later
    for ($i = 1; $i < 7; $i++) {
      $ammount = rand(6, 12);
      for ($j = 1; $j <= $ammount; $j++) {
        \App\Track::create([
          'order' => $j,
          'title' => $faker->words(3, true),
          'duration' => $faker->numberBetween(1, 600) * 1000, // 00:01 - 10:00
          'file' => 'demo.mp3',
          'series_id' => $i,
        ]);
      }
    }
  }
}
