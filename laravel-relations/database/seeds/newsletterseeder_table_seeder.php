<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
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
            $tag1 = $tagList[$randomTagKey[0]];
            $tag2 = $tagList[$randomTagKey[1]];
            $tag3 = $tagList[$randomTagKey[2]];
            $tag4 = $tagList[$randomTagKey[3]];
            $tag5 = $tagList[$randomTagKey[4]];

            $articleObject->save();

            $article->tags()->attach($tag1);
            $article->tags()->attach($tag2);
            $article->tags()->attach($tag3);
            $article->tags()->attach($tag4);
            $article->tags()->attach($tag5);
        }
    }
}
