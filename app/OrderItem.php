<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 
        'book_id', 
        'quantity',
        'subtotal'
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function book(){
        return $this->belongsTo('App\Book');
    }

}
