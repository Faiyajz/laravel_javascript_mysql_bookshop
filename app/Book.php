<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Book extends Model
{
    use Searchable;
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
        'name',
        'description',
        'price', 
        'writer_id', 
        'category_id', 
        'cover_page', 
        'preview_page', 
        'totalsells', 
        'reviews'
    ];


    protected $coverpage_location = '/coverpages/';
    protected $previewpage_location = '/previewpages/';

    public function getCoverPageAttribute($photo){
    	return $this->coverpage_location . $photo;
    }
    public function getPreviewPageAttribute($photo){
        return $this->previewpage_location . $photo;
    }

    public function writer(){
        return $this->belongsTo('App\Writer');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
