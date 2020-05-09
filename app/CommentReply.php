<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['user_id', 'comment_id', 'reply'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
