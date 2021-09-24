<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use App\Tag;
use Faker\Generator as Faker;

class newsletterseeder_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        //Autori
        $authorListId = [];

        for($i = 0; $i < 20; $i++){
            $author = new Author();
            $author->name = $faker->word();
            $author->surname = $faker->word();
            $author->picture = $faker->imageUrl(640, 480, 'post', true);
            $author->save();
            $authorListId[]=$author->id;
        }
        //Tags
        $tagList = [
            'sport',
            'attualità',
            'calcio',
            'formula 1',
            'intrattenimento',
            'italia',
            'europa'
        ];
            for($i = 0; $i < 7; $i++){
                $tag = new Tag();
                $tag->name='mio tag';
                $tag->save();
                $tagsList[] = $tag->id;
            }

        for($x = 0; $x < 50; $x++){

            //creo Article:

            $articleObject = new Article();
            $articleObject->title = $faker->words(5, true);
            $articleObject->body = $faker->paragraph();
            $articleObject->picture = $faker->imageUrl(640, 480, 'post', true);

            //Prendo id degli autori
            $randAuthorKey = array_rand($authorListId, 1);
            $authorID = $authorListId[$randAuthorKey];
            $articleObject->author_id = $authorID;

            //Prendo id dei tags
            $randTagKey = array_rand($tagList, 5);
            $tag1 = $tagList[$randTagKey[0]];
            $tag2 = $tagList[$randTagKey[1]];
            $tag3 = $tagList[$randTagKey[2]];
            $tag4 = $tagList[$randTagKey[3]];
            $tag5 = $tagList[$randTagKey[4]];

            $articleObject->save();

            $articleObject->tags()->attach($tag1);
            $articleObject->tags()->attach($tag2);
            $articleObject->tags()->attach($tag3);
            $articleObject->tags()->attach($tag4);
            $articleObject->tags()->attach($tag5);
        }
    }
}
