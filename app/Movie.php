<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function Genres(){
       return $this->hasMany(Genre::class);
        //return $this->hasMany('App\CommentModel', 'post_id');
    }
}
