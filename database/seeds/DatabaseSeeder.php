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

    // TODO: test users, remove later
    \App\User::create([
      'email' => 'a@b',
      'password' => '$2y$10$ofiQGeXPluKG45u62i7.K.PuJArQUXgyY5Adu1EyJKM0zMcrO.MSO', // p
    ]);
    \App\User::create([
      'email' => 'aa@b',
      'password' => '$2y$10$ofiQGeXPluKG45u62i7.K.PuJArQUXgyY5Adu1EyJKM0zMcrO.MSO', // p
    ]);
    \App\User::create([
      'email' => 'aaa@b',
      'password' => '$2y$10$ofiQGeXPluKG45u62i7.K.PuJArQUXgyY5Adu1EyJKM0zMcrO.MSO', // p
    ]);
    // TODO: test histories, remove later
    \App\History::create([
      'user_id' => 1,
    ]);
    \App\History::create([
      'user_id' => 2,
    ]);
    \App\History::create([
      'user_id' => 3,
    ]);


    // TODO: test series, remove later?
    \App\Series::create([
      'slug' => 'celeste',
      'title' => 'Celeste',
      'cover' => 'celeste.jpg',
    ]);
    \App\Series::create([
      'slug' => 'doki-doki-literature-club',
      'title' => 'Doki Doki Literature Club',
      'cover' => 'doki-doki-literature-club.jpg',
    ]);
    \App\Series::create([
      'slug' => 'final-fantasy',
      'title' => 'Final Fantasy',
      'cover' => 'final-fantasy.jpg',
    ]);
    \App\Series::create([
      'slug' => 'hypderdimension-neptunia',
      'title' => 'Hypderdimension Neptunia',
      'cover' => 'hypderdimension-neptunia.jpg',
    ]);
    \App\Series::create([
      'slug' => 'zelda-the-legend-of',
      'title' => 'Zelda, The Legend of',
      'cover' => 'zelda-the-legend-of.jpg',
    ]);
    \App\Series::create([
      'slug' => 'ar-tonelico',
      'title' => 'Ar Tonelico',
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
//          'duration' => $faker->numberBetween(1, 600), // 00:01 - 10:00
          'duration' => $j % 2 === 0 ? 44 : 51,
          'file' => ($j % 2 === 0 ? 'fair-theme.mp3' : 'field.mp3') . "#{$i}{$j}",
          'series_id' => $i,
        ]);
        if (mt_rand(0, 1)) { // 50% chance to add to a random playlist
          \App\Playlist::find($faker->numberBetween(1, 6))
            ->tracks()
            ->attach($track, ['order' => $faker->numberBetween(1, 9),]);
        }
        if (mt_rand(0, 1)) { // 50% chance to add to a dummy history
          \App\History::find(mt_rand(1, 3))
            ->tracks()
            ->attach($track);
        }
      }
    }
  }
}
