<?php

use App\Series;
use App\Track;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    // create example user
    User::create([
      'email' => 'a@b',
      'password' => bcrypt('p'),
    ])->history()->create();

    // create example series with tracks
    Series::create([
      'slug' => 'doki-doki-literature-club',
      'title' => 'Doki Doki Literature Club',
      'cover' => 'doki-doki-literature-club.jpg',
    ])->tracks()->createMany([
      [
        'order' => 1,
        'title' => 'Your Reality',
        'duration' => 181,
        'file' => 'Your Reality.mp3',
      ], [
        'order' => 2,
        'title' => 'Doki Doki Literature Club!',
        'duration' => 127,
        'file' => 'Doki Doki Literature Club!.mp3',
      ], [
        'order' => 3,
        'title' => 'My Confession',
        'duration' => 186,
        'file' => 'My Confession.mp3',
      ], [
        'order' => 4,
        'title' => 'I Still Love You',
        'duration' => 163,
        'file' => 'I Still Love You.mp3',
      ], [
        'order' => 5,
        'title' => 'Ohayou Sayori!',
        'duration' => 162,
        'file' => 'Ohayou Sayori!.mp3',
      ],
    ]);

    Series::create([
      'slug' => 'hypderdimension-neptunia',
      'title' => 'Hypderdimension Neptunia',
      'cover' => 'hypderdimension-neptunia.jpg',
    ])->tracks()->createMany([
      [
        'order' => 1,
        'title' => 'Smile Spiral',
        'duration' => 259,
        'file' => 'smile-spiral.mp3',
      ], [
        'order' => 2,
        'title' => 'Lady Cool',
        'duration' => 263,
        'file' => 'lady-cool.mp3',
      ], [
        'order' => 3,
        'title' => 'Sham Cold Girls',
        'duration' => 274,
        'file' => 'Sham Cold Girls.mp3',
      ], [
        'order' => 4,
        'title' => 'Goddess of Victory',
        'duration' => 234,
        'file' => 'goddess of victory.mp3',
      ], [
        'order' => 5,
        'title' => 'My Rule',
        'duration' => 258,
        'file' => 'MY RULE.mp3',
      ],
    ]);

    Series::create([
      'slug' => 'fairy-fencer-f',
      'title' => 'Fairy Fencer F',
      'cover' => 'fairy-fencer-f.jpg',
    ])->tracks()->createMany([
      [
        'order' => 1,
        'title' => 'All Our Might Tonight',
        'duration' => 228,
        'file' => 'All Our Might Tonight.mp3',
      ], [
        'order' => 2,
        'title' => 'Full Contact',
        'duration' => 237,
        'file' => 'FULL CONTACT.mp3',
      ],
    ]);

    Series::create([
      'slug' => 'icey',
      'title' => 'ICEY',
      'cover' => 'icey.jpg',
    ])->tracks()->createMany([
      [
        'order' => 1,
        'title' => 'ICEY',
        'duration' => 188,
        'file' => 'ICEY.mp3',
      ], [
        'order' => 2,
        'title' => 'Moonlight Solitary Bridge',
        'duration' => 101,
        'file' => 'Moonlight Solitary Bridge.mp3',
      ], [
        'order' => 3,
        'title' => 'Marionette Theater',
        'duration' => 113,
        'file' => 'Marionette Theater.mp3',
      ], [
        'order' => 4,
        'title' => 'Dance with Jack',
        'duration' => 91,
        'file' => 'Dance with Jack.mp3',
      ],
    ]);

    Series::create([
      'slug' => 'irisu_syndrome',
      'title' => 'Irisu Syndrome',
      'cover' => 'irisu_syndrome.jpg',
    ])->tracks()->createMany([
      [
        'order' => 1,
        'title' => 'A Cat and a Rabbit and an Old Story',
        'duration' => 196,
        'file' => 'A Cat and a Rabbit and an Old Story.mp3',
      ], [
        'order' => 2,
        'title' => 'About 10 Hours Looking at the Ceiling',
        'duration' => 216,
        'file' => 'About 10 Hours Looking at the Ceiling.mp3',
      ], [
        'order' => 3,
        'title' => "I Didn't Talk to Anyone Today",
        'duration' => 219,
        'file' => "I Didn't Talk to Anyone Today.mp3",
      ], [
        'order' => 4,
        'title' => 'I Think I Might Like to Be a Child',
        'duration' => 141,
        'file' => 'I Think I Might Like to Be a Child.mp3',
      ], [
        'order' => 5,
        'title' => 'USAGI Note',
        'duration' => 246,
        'file' => 'USAGI Note.mp3',
      ], [
        'order' => 6,
        'title' => 'Zero Reception',
        'duration' => 231,
        'file' => 'Zero Reception.mp3',
      ],
    ]);
  }
}
