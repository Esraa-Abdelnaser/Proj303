<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','name','price','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    
    public function customer(){
         return $this->belongsToMany('App\Customer','customers_products','product_id','customer_id'
         ,'id','id')->withPivot('quantity','sub_price','id');
    }
    
}
