<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class Writer extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    protected $fillable = [
        'name', 'about', 'avatar'
    ];



    protected $picture_location = '/writers/';

    public function getAvatarAttribute($photo){
    	return $this->picture_location . $photo;
    }

    public function books(){
        return $this->hasMany('App\Book');
    }

}
