<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use \App\Artist;
use \App\Comment;
use \App\Country;
use \App\Genre;
use \App\Listen;
use \App\Rank;
use \App\Song;
use \App\Tag;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::getQuery()->delete();
        Comment::getQuery()->delete();
        Country::getQuery()->delete();
        Genre::getQuery()->delete();
        Listen::getQuery()->delete();
        Rank::getQuery()->delete();
        Song::getQuery()->delete();
        Tag::getQuery()->delete();
        User::getQuery()->delete();

        $faker = Faker::create();

        $users = [];
        foreach (range(1,10) as $index) {
            $users[] = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123'),
            ]);
        }


        $countries = [];
        foreach (['USA','Ukraine','Germany','England','France'] as $name) {
            $countries[] = Country::create(['name' => $name ]);
        }

        $genres = [];
        foreach (['Pop','Classics','Rock','Rap','Jazz'] as $name) {
            $genres[] = Genre::create(['name' => $name ]);
        }

        $tags = [];
        foreach (['love','about women','about men','war','sea','animals','sad','merry'] as $name) {
            $tags[] = Tag::create(['name' => $name ]);
        }

        $artists = [];
        foreach (range(1,10) as $index) {
            $artists[] = Artist::create([
                'name' => $faker->name,
                'country_id' => $countries[array_rand($countries)]->id,
                'photo_path' => str_replace('\\','/',str_replace('public/','', $faker->image('public/img/artists', 300, 300, 'people')))
            ]);
        }

        foreach (range(1,20) as $index) {
            $song = Song::create([
                'name' => substr($faker->realText(20),0,-1),
                'is_song' => rand(1, 100) < 70,
                'year' => rand(1950, 2016),
                'duration' => rand(60, 300),
                'genre_id' => $genres[array_rand($genres)]->id,
                'performer_id' => $artists[array_rand($artists)]->id,
                'composer_id' => $artists[array_rand($artists)]->id,
            ]);

            foreach (range(1,3) as $index) {
                $song->tags()->attach($tags[array_rand($tags)]);
            }

            foreach (range(1,rand(2,10)) as $index) {
                $song->ranks()->create([
                    'user_id' => $users[array_rand($users)]->id,
                    'value' => rand(1,5)
                ]);
            }

            foreach (range(1,rand(2,20)) as $index) {
                $song->listens()->create([
                    'user_id' => $users[array_rand($users)]->id,
                ]);
            }

            foreach (range(1,rand(2,10)) as $index) {
                $song->comments()->create([
                    'user_id' => $users[array_rand($users)]->id,
                    'body' => $faker->realText,
                ]);
            }
        }

    }
}
