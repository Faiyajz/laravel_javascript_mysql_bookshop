<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'book_id', 'rating','comment'];

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
