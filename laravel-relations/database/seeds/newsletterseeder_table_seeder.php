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
        $listOfTags = [
            'sport',
            'world',
            'cronaca',
            'attualità',
            'calcio',
            'italia',
            'europa'
        ];

        $listOfTagID = [];

        foreach($listOfTags as $tagName) {

            $tagObject = new Tag (); 
            $tagObject->name = $tagName; 
            $tagObject->save(); 
            $listOfTagID[] = $tagObject->id; 
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
            $randTagKey = array_rand($listOfTagID, 4);
            $tag1 = $listOfTagID[$randTagKey[0]];
            $tag2 = $listOfTagID[$randTagKey[1]];
            $tag3 = $listOfTagID[$randTagKey[2]];
            $tag4 = $listOfTagID[$randTagKey[3]];


            $articleObject->save();

            $articleObject->tags()->attach($tag1);
            $articleObject->tags()->attach($tag2);
            $articleObject->tags()->attach($tag3);
            $articleObject->tags()->attach($tag4);

        }
    }
}
