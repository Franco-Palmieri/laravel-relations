<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function tags(){ //tags è la funzione con la quale faccio l'attach nel seeder
        return $this->belongsToMany(Tag::class);
    }
}
