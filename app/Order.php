<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Order extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['user.id', 'id', 'bill']
            ]
        ];
    }


    protected $fillable = [
        'user_id', 
        'name', 
        'phone_no',
        'email',
        'address',
        'books',
        'bill',
        'is_paid',
        'delivery_status',
        'payment_method',
        'payment_id',
        'transaction_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function order_item() {
        return $this->hasMany('App\OrderItem');
    }
}
