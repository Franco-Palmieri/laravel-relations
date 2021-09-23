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
        $authorListId = [];

        for($i = 0; $i < 50; $i++){
            $author = new Author();
            $author->name = $faker->word(2, false);
            $author->surname = $faker->word();
            $author->picture = $faker->imageUrl(640, 480, 'post', true);
            $author->save();
            $authorListId[]=$author->id;
        }

        for($x = 0; $x < 50; $x++){

            //creo Article:

            $articleObject = new Article();
            $articleObject->title = $faker->word(5, false);
            $articleObject->body = $faker->paragraph();
            $articleObject->picture = $faker->imageUrl(640, 480, 'post', true);

            //Prendo id degli autori
            $randAuthorKey = array_rand($authorListId, 1);
            $authorID = $authorListId[$randAuthorKey];
            $articleObject->author_id = $authorID;

            $articleObject->save();
        }
    }
}
