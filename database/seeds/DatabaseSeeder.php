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
    // TODO: test history, remove later
    \App\History::create([]);


    // TODO: test series, remove later?
    \App\Series::create([
      'slug' => 'celeste',
      'title' => 'Celeste',
      'title_short' => 'Celeste',
      'cover' => 'celeste.jpg',
    ]);
    \App\Series::create([
      'slug' => 'doki-doki-literature-club',
      'title' => 'Doki Doki Literature Club',
      'title_short' => 'DDLC',
      'cover' => 'doki-doki-literature-club.jpg',
    ]);
    \App\Series::create([
      'slug' => 'final-fantasy',
      'title' => 'Final Fantasy',
      'title_short' => 'Final Fantasy',
      'cover' => 'final-fantasy.jpg',
    ]);
    \App\Series::create([
      'slug' => 'hypderdimension-neptunia',
      'title' => 'Hypderdimension Neptunia',
      'title_short' => 'Neptunia',
      'cover' => 'hypderdimension-neptunia.jpg',
    ]);
    \App\Series::create([
      'slug' => 'zelda-the-legend-of',
      'title' => 'Zelda, The Legend of',
      'title_short' => 'Zelda',
      'cover' => 'zelda-the-legend-of.jpg',
    ]);
    \App\Series::create([
      'slug' => 'ar-tonelico',
      'title' => 'Ar Tonelico',
      'title_short' => 'Ar Tonelico',
      'cover' => 'ar-tonelico.jpg',
    ]);

    // TODO: test playlists, remove later?
    for ($i = 1; $i <= 6; $i++) {
      $title = $faker->unique()->words(3, true);
      \App\Playlist::create([
        'slug' => \Illuminate\Support\Str::slug($title),
        'title' => $title,
      ]);
    }

    // TODO: test tracks, remove later?
    for ($i = 1; $i <= 6; $i++) {
      $ammount = rand(8, 12);
      for ($j = 1; $j <= $ammount; $j++) {
        $track = \App\Track::create([
          'order' => $j,
          'title' => $faker->unique()->words(3, true),
          'duration' => $faker->numberBetween(1, 600), // 00:01 - 10:00
          'file' => 'demo.mp3',
          'series_id' => $i,
        ]);
        if (mt_rand(0, 1)) { // 50% chance to add to a random playlist
          \App\Playlist::find($faker->numberBetween(1, 6))
            ->tracks()
            ->attach($track, ['order' => $faker->numberBetween(1, 9),]);
        }
        if (mt_rand(1, 10) <= 2) { // 20% chance to add to dummy history
          \App\History::find(1)
            ->tracks()
            ->attach($track);
        }
      }
    }
  }
}
