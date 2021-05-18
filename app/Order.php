<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = "orders";
    protected $fillable = ['id','customer_id','quantity','sub_price','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id');
    }
}
