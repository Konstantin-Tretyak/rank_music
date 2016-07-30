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

        /*$users = [];
        foreach (range(1,10) as $index) {
            $users[] = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123'),
            ]);
        }*/

        $users = [];
        $csv=file_get_contents("D:\C V\\users.csv");
        $explode=explode("\r\n",$csv);
        //dd($explode);
        for($i=0;$i<count($explode);$i++)
        {
            $explode[$i] = explode(";",$explode[$i]);
            $users[] = User::create([
            'name' => $explode[$i][0],
            'email' => $explode[$i][1],
            'password' => $explode[$i][2],
            'photo_path' => $explode[$i][3],
        ]);
        }


        $countries = [];
        $csv=file_get_contents("D:\C V\\countries.csv");
        $explode=explode("\r\n",$csv);
        //dd($explode);
        for($i=0;$i<count($explode);$i++)
        {
            $explode[$i] = explode(";",$explode[$i]);
            $countries[] = Country::create([
            'name' => $explode[$i][0],
        ]);
        }

        /*foreach (['USA','Ukraine','Germany','England','France'] as $name) {
            $countries[] = Country::create(['name' => $name ]);
        }*/

        $genres = [];
        $csv=file_get_contents("D:\C V\\genres.csv");
        $explode=explode("\r\n",$csv);
        //dd($explode);
        for($i=0;$i<count($explode);$i++)
        {
            $explode[$i] = explode(";",$explode[$i]);
            $genres[] = Genre::create([
            'name' => $explode[$i][0],
        ]);
        }
        /*foreach (['Pop','Classics','Rock','Rap','Jazz'] as $name) {
            $genres[] = Genre::create(['name' => $name ]);
        }*/

        $tags = [];
        foreach (['love','about women','about men','war','sea','animals','sad','merry'] as $name) {
            $tags[] = Tag::create(['name' => $name ]);
        }

        $artists = [];
        $csv=file_get_contents("D:\C V\\artist.csv");
        $explode=explode("\r\n",$csv);
        //dd($explode);
        for($i=0;$i<count($explode);$i++)
        {
            $explode[$i] = explode(";",$explode[$i]);
            $artists[] = Artist::create([
            'name' => $explode[$i][0],
            'photo_path' => $explode[$i][1],
            'country_id' => $explode[$i][2]
        ]);
        }
        /*foreach (range(1,10) as $index) {
            $artists[] = Artist::create([
                'name' => $faker->name,
                'country_id' => $countries[array_rand($countries)]->id,
                'photo_path' => str_replace('\\','/',str_replace('public/','', $faker->image('public/img/artists', 300, 300, 'people')))
            ]);
        }*/

        $song = [];

        $csv=file_get_contents("D:\C V\\songs.csv");
        $explode=explode("\r\n",$csv);

        $csv_rank=file_get_contents("D:\C V\\ranks.csv");
        $explode_rank=explode("\r\n",$csv_rank);
        //dd($explode);
        for($i=0;$i<count($explode);$i++)
        {
            $explode[$i] = explode(";",$explode[$i]);
            $song[] = Song::create([
                'name' => $explode[$i][0],
                'is_song' => $explode[$i][1],
                'year' => $explode[$i][2],
                'duration' => $explode[$i][3],
                'genre_id' => $explode[$i][4],
                'performer_id' => $explode[$i][5],
                'composer_id' => $explode[$i][6],
                'rank_count' => $explode[$i][7],
                'rank' => $explode[$i][8],
                'place_in_rank' => $explode[$i][9],
                'video_youtube_id' => $explode[$i][10],
                'text' => $explode[$i][11],
            ]);

            /*if($i<count($explode_rank))
            {
                for($j=$i*11;$j<$i*11+11;$j++)
                {
                    $explode_rank[$j] = explode(";",$explode_rank[$j]);
                    Rank::create([
                        'user_id'=>$explode_rank[$j][0],
                        'song_id'=>$explode_rank[$j][1],
                        'value'=>$explode_rank[$j][2],
                    ]);
                }
            }*/
        }

        /*foreach (range(1,20) as $index)
        {
            $song = Song::create([
                'name' => substr($faker->realText(20),0,-1),
                'is_song' => rand(1, 100) < 70,
                'year' => rand(1950, 2016),
                'duration' => rand(60, 300),
                'genre_id' => $genres[array_rand($genres)]->id,
                'performer_id' => $artists[array_rand($artists)]->id,
                'composer_id' => $artists[array_rand($artists)]->id,
            ]);

            $songer[] = $song;*/

            /*foreach (range(1,3) as $index) {
                $song->tags()->attach($tags[array_rand($tags)]);
            }

            foreach (range(1,rand(2,20)) as $index) {
                $song->listens()->create([
                    'user_id' => $users[array_rand($users)]->id,
                ]);
            }*/

            /*foreach (range(1,rand(2,10)) as $index) {
                $song->comments()->create([
                    'user_id' => $users[array_rand($users)]->id,
                    'body' => $faker->realText,
                ]);
            }*/

            /*foreach (range(1,rand(2,10)) as $index)
            {
                $song->ranks()->create([
                    'user_id' => $users[array_rand($users)]->id,
                    'value' => rand(1,5)
                ]);
            }*/

            /*$song->update(['rank'=>$song->ranked,
                           'rank_count'=>$song->ranked_count,
                            'listens_count'=>$song->listen_count()]);*/
        //}
    }
}
